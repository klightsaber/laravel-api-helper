<?php

namespace BrooksYang\LaravelApiHelper;

use BrooksYang\LaravelApiHelper\Traits\DocHelper;
use Illuminate\Support\Facades\Cache;

class Doc
{
    use DocHelper;

    /**
     * 获取路由
     *
     * @return mixed
     */
    public function routes()
    {
        return $this->getRoutes();
    }

    /**
     * 获取模块
     *
     * @return array
     */
    public function modules()
    {
        return $this->getModules();
    }

    /**
     * 获取指定模块下的api
     *
     * @param string $module
     * @return array
     */
    public function api($module = '')
    {
        return $this->getApiByModule($module);
    }

    /**
     * 获取api总数
     *
     * @return int
     */
    public function total()
    {
        $items = Cache::tags("api_doc")->get('doc_for_') ?: $this->api();

        return count($items);
    }
}
