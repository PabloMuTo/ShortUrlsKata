<?php

namespace Src\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Application\ShortUrlsHandle;
use Src\Infrastructure\Request\ShortUrlsRequest;

class ShortUrlsController extends Controller
{
    public function __construct(
        private ShortUrlsHandle $handleShortUrls
    )
    { }

    /**
     * @param ShortUrlsRequest $request
     * @return JsonResponse
     */
    public function __invoke( ShortUrlsRequest $request ): JsonResponse
    {
        try {
            $response = $this->handleShortUrls->handle($request->get('url'));
            return response()->json(['url' => $response]);
        }
        catch ( \Exception $e) {

            return response()->json([
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => [] //TODO
            ]);
        }
    }
}
