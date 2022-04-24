<?php

namespace App\Http\Controllers\Home;

use App\Services\Home\LineService;
use App\Http\Controllers\Controller;

class LineController extends Controller
{
    public function __construct(LineService $linesService)
    {
        $this->linesService = $linesService;
    }

    /**
     * getLines Description：
     * 获取线路列表
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 10:03:13
     *
     * @return json
     */
    public function getLines()
    {
        // 获取参数
        $page = request()->input('page', 1);
        $page_size = request()->input('page_size', 20);

        // 获取线路列表
        $lines = $this->linesService->getLines($page, $page_size);

        return lreturn_json($lines);
    }

    /**
     * getFreeLine Description：
     * 获取免费线路
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:07:35
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFreeLine()
    {
        return lreturn_json($this->linesService->getFreeLine());
    }
}
