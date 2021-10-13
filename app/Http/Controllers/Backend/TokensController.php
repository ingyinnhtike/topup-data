<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AppBaseController;
use App\Models\Merchants;
use App\Repositories\PasswordGrantTokensRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\Controller;

class TokensController extends Controller
{
    /**
     * @var PasswordGrantTokensRepository
     */
    protected $passwordGrantTokensRepository;

    /**
     * TokensController constructor.
     *
     * @param PasswordGrantTokensRepository $passwordGrantTokensRepository
     */
    public function __construct(PasswordGrantTokensRepository $passwordGrantTokensRepository)
    {
        $this->passwordGrantTokensRepository = $passwordGrantTokensRepository;
    }

    /**
     * Display a listing of the Tokens.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->passwordGrantTokensRepository->pushCriteria(new RequestCriteria($request));
        $passwordGrantTokens = $this->passwordGrantTokensRepository->getActivePaginated(25, 'id', 'asc');

        return view('backend.tokens.index')
            ->withMessage('No record')
            ->with('passwordGrantTokens', $passwordGrantTokens);
    }

    /**
     * Display the specified Merchants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passwordGrantTokens = $this->passwordGrantTokensRepository->findWithoutFail($id);

        if (empty($passwordGrantTokens)) {
            Flash::error('Token not found');

            return redirect(route('admin.tokens.index'));
        }

        return view('backend.tokens.show')->with('passwordGrantTokens', $passwordGrantTokens);
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $http = new Client();

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => env('token_client_id'),
                'client_secret' => env('token_client_secret'),
                'username' => $email,
                'password' => $password,
                'scope' => '',
            ],
        ]);

        $merchantResult = Merchants::where([
            ["email", '=', $email]
        ])->first();

        $item['merchant_id'] = $merchantResult->id;

        $item['tokens'] = (string) $response->getBody();

//        return json_decode((string) $response->getBody(), true);

        $this->passwordGrantTokensRepository->create($item);

        return redirect()->route('admin.tokens.index')->withFlashSuccess(__('Success'));
    }
}
