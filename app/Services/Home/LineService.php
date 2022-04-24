<?php
namespace App\Services\Home;

use App\Models\Lines;

class LineService
{
    private $lines;

    public function __construct(Lines $lines)
    {
        $this->lines = $lines;
    }

    /**
     * getLines Description：
     * 获取线路列表
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 10:08:51
     *
     * @param $page
     * @param $size
     *
     * @return array
     */
    public function getLines($page, $size)
    {
        $lines = $this->lines::with('nation')->where('status', $this->lines::ON_LINE)
                             ->where('deleted_at', '=', null)
                             ->where('is_free', $this->lines::IS_NOT_FREE)
                             ->orderBy('quality', 'desc')
                             ->offset(($page - 1) * $size)
                             ->limit($size)
                             ->get();

        return $lines ? $lines->toArray() : [];
    }

    /**
     * geFreeLine Description：
     * 获取免费线路
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:06:16
     *
     * @return array
     */
    public function getFreeLine()
    {
        $line = $this->lines::with('nation')->where('status', $this->lines::ON_LINE)
                            ->where('deleted_at', '=', null)
                            ->where('is_free', $this->lines::IS_FREE)
                            ->orderBy('id', 'desc')
                            ->first();

        return $line ? $line->toArray() : [];
    }
}
