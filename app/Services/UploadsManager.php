<?php

/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/11/17
 * Time: 4:34 PM
 */

namespace App\Services;

use Carbon\Carbon;
use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadsManager
 * @package App\Services
 */
class UploadsManager
{
    /**
     * @var
     */
    protected $disk;
    /**
     * @var PhpRepository
     */
    protected $mimeDetect;

    /**
     * UploadsManager constructor.
     * @param PhpRepository $mimeDetect
     */
    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk(config('backend.uploads.storage'));
        $this->mimeDetect = $mimeDetect;
    }

    /**
     * Return files and directories within a folder
     *
     * @param string $folder
     * @return array of [
     *    'folder' => 'path to current folder',
     *    'folderName' => 'name of just current folder',
     *    'breadCrumbs' => breadcrumb array of [ $path => $foldername ]
     *    'folders' => array of [ $path => $foldername] of each subfolder
     *    'files' => array of file details on each file in folder
     * ]
     */
    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);

        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs, -1);
        $folderName = current($slice);
        $breadcrumbs = array_slice($breadcrumbs, 0, -1);

        $subfolders = [];
        foreach (array_unique($this->disk->directories($folder)) as $subfolder) {
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }

        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    /**
     * Sanitize the folder name
     * @param $folder
     * @return string
     */
    protected function cleanFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }

    /**
     * Return breadcrumbs to current folder
     * @param $folder
     * @return array
     */
    protected function breadcrumbs($folder)
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => '<i class="fa fa-dashboard"></i>&nbsp;&nbsp;root'];

        if (empty($folder)) {
            return $crumbs;
        }

        $folders = explode('/', $folder);
        $build = '';
        foreach ($folders as $folder) {
            $build .= '/'.$folder;
            $crumbs[$build] = $folder;
        }

        return $crumbs;
    }

    /**
     * Return an array of file details for a file
     *
     * @param $path
     * @return array
     */
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');

        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebpath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }

    /**
     * Return the full web path to a file
     *
     * @param $path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function fileWebpath($path)
    {
        $path = rtrim(config('backend.uploads.webpath'), '/') . '/' .
            ltrim($path, '/');
        return url($path);
    }

    /**
     * Return the full path to a file
     *
     * @param $path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function filePath($path)
    {
        $path = rtrim(config('backend.uploads.webpath'), '/') . '/' .
            ltrim($path, '/');
        return public_path($path);
    }

    /**
     * Return the mime type
     *
     * @param $path
     * @return mixed|null|string
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }

    /**
     * Return the file size
     *
     * @param $path
     * @return
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * Return the last modified time
     *
     * @param $path
     * @return Carbon
     */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }

    /**
     * Create a new directory
     *
     * @param $folder
     * @return string
     */
    public function createDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        if ($this->disk->exists($folder)) {
            return trans('alerts.backend.uploads.folder_already_exist',[ 'name' => $folder ]);
        }

        return $this->disk->makeDirectory($folder);
    }

    /**
     * Delete a directory
     *
     * @param $folder
     * @return string
     */
    public function deleteDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        $filesFolders = array_merge(
            $this->disk->directories($folder),
            $this->disk->files($folder)
        );
        if (! empty($filesFolders)) {
            return trans('alerts.backend.uploads.dir_must_empty');
        }

        return $this->disk->deleteDirectory($folder);
    }

    /**
     * Delete a file
     *
     * @param $path
     * @return string
     */
    public function deleteFile($path)
    {
        $path = $this->cleanFolder($path);

        if (! $this->disk->exists($path)) {
            return trans('alerts.backend.uploads.file_not_exist');
        }

        return $this->disk->delete($path);
    }

    /**
     * Save a file
     *
     * @param $path
     * @param $content
     * @return string
     */
    public function saveFile($path, $content)
    {
        $path = $this->cleanFolder($path);

        if ($this->disk->exists($path)) {
            return trans('alerts.backend.uploads.file_already_exist');
        }

        return $this->disk->put($path, $content);
    }

    /**
     * @param $old
     * @param $new
     * @return bool|string
     */
    public function renameOrMoveFile($old , $new)
    {
        $new = $this->cleanFolder($new);
        $old = $this->cleanFolder($old);

        if ($this->disk->exists($new)) {
            return trans('alerts.backend.uploads.rename_existing_err');
        } else {
            return ($this->disk->move($old , $new) ? true : trans('alerts.backend.uploads.rename_permission_err'));
        }
    }
}