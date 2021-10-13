<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 3/15/17
 * Time: 7:31 PM
 */

namespace App\Models\Setting\Language\Traits\Attribute;


trait LanguageAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.setting.language.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {

        if ($this->locale_code != 'en') {
            return '<a href="'.route('admin.setting.language.destroy', $this).'"
                data-method="delete"
                data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
                class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getEnableButtonAttribute()
    {
        return $this->enabled ? '<a href="' . route('admin.setting.language.enable', $this) . '" class="btn btn-xs btn-warning" data-toggle="confirmation" data-title="'.trans('strings.backend.general.are_you_sure').'"><i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.disable') . '"></i></a> ' : '<a href="' . route('admin.setting.language.enable', $this) . '" class="btn btn-xs btn-info" data-toggle="confirmation" data-title="'.trans('strings.backend.general.are_you_sure').'"><i class="fa fa-unlock" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.enable') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEnableButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getDeleteButtonAttribute();
    }
}