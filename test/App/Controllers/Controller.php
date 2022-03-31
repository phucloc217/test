<?php
class Controller
{
    const VIEW_FOLDER = 'Resource/Views';
    protected function view($viewPath, array $data = [])
    {
        foreach ($data as $k => $v)
            $$k = $v;
        require(self::VIEW_FOLDER . '/' . str_replace('.', '/', $viewPath) . '.php');
    }
}
