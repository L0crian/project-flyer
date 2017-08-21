<?php

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

function flyer_path(App\Flyer $flyer)
{
    return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}

function link_to($body, $path, $type)
{
    $csrf = csrf_field();
    $method_field = method_field($type);

    if (is_object($path)) {
        $action .= '/' . $path->getTable();

        if (in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
            $action .= '/' . $path->getKey();
        }

    } else {
        $action = $path;
    }

    return <<<EOT
      <form action="$action" method="POST">
         $csrf
         $method_field
         <button type="submit">{$body}</button>
       </form>
EOT;


}