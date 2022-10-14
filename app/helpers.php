<?php

if (! function_exists('home_template')) {
    /**
     * Get the name of the current user's home template.
     *
     * @return String
     */
    function home_template(): String
    {
        $user = auth()->user();
        $view = "home";
        if($user) {
            $view .= "." . $user->role;
        } else {
            $view .= ".guest";
        }
        return $view;
    }
}
