<?php
// Code within app\Helpers\Helper.php

namespace App\Helpers;

use Carbon\Carbon;
use Config;
use DateTimeInterface;
use Illuminate\Support\Str;

class Helper
{
    public static function applClasses()
    {
        $data          = config('custom.custom');
        $layoutClasses = [
            'theme'                => $data['theme'],
            'sidebarCollapsed'     => $data['sidebarCollapsed'],
            'navbarColor'          => $data['navbarColor'],
            'menuType'             => $data['menuType'],
            'navbarType'           => $data['navbarType'],
            'navbarClass'          => '',
            'footerType'           => $data['footerType'],
            'sidebarClass'         => 'menu-expanded',
            'bodyClass'            => $data['bodyClass'],
            'pageHeader'           => $data['pageHeader'],
            'blankPage'            => $data['blankPage'],
            'blankPageClass'       => '',
            'contentLayout'        => $data['contentLayout'],
            'sidebarPositionClass' => '',
            'contentsidebarClass'  => '',
            'mainLayoutType'       => $data['mainLayoutType'],
            'direction'            => $data['direction'],
        ];


        //Theme
        if ($layoutClasses['theme'] == 'dark')
            $layoutClasses['theme'] = "dark-layout";
        else if ($layoutClasses['theme'] == 'semi-dark')
            $layoutClasses['theme'] = "semi-dark-layout";
        else
            $layoutClasses['theme'] = "light";

        //menu Type
        switch ($layoutClasses['menuType']) {
            case "static":
                $layoutClasses['menuType'] = "menu-static";
                break;
            default:
                $layoutClasses['menuType'] = "menu-fixed";
        }

        //navbar
        switch ($layoutClasses['navbarType']) {
            case "static":
                $layoutClasses['navbarType']  = "navbar-static";
                $layoutClasses['navbarClass'] = "navbar-static-top";
                break;
            case "sticky":
                $layoutClasses['navbarType']  = "navbar-sticky";
                $layoutClasses['navbarClass'] = "fixed-top";
                break;
            case "hidden":
                $layoutClasses['navbarType'] = "navbar-hidden";
                break;
            default:
                $layoutClasses['navbarType']  = "navbar-floating";
                $layoutClasses['navbarClass'] = "floating-nav";
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true')
            $layoutClasses['sidebarClass'] = "menu-collapsed";

        // sidebar Collapsed
        if ($layoutClasses['blankPage'] == 'true')
            $layoutClasses['blankPageClass'] = "blank-page";

        //footer
        switch ($layoutClasses['footerType']) {
            case "sticky":
                $layoutClasses['footerType'] = "fixed-footer";
                break;
            case "hidden":
                $layoutClasses['footerType'] = "footer-hidden";
                break;
            default:
                $layoutClasses['footerType'] = "footer-static";
        }

        //Cotntent Sidebar
        switch ($layoutClasses['contentLayout']) {
            case "content-left-sidebar":
                $layoutClasses['sidebarPositionClass'] = "sidebar-left";
                $layoutClasses['contentsidebarClass']  = "content-right";
                break;
            case "content-right-sidebar":
                $layoutClasses['sidebarPositionClass'] = "sidebar-right";
                $layoutClasses['contentsidebarClass']  = "content-left";
                break;
            case "content-detached-left-sidebar":
                $layoutClasses['sidebarPositionClass'] = "sidebar-detached sidebar-left";
                $layoutClasses['contentsidebarClass']  = "content-detached content-right";
                break;
            case "content-detached-right-sidebar":
                $layoutClasses['sidebarPositionClass'] = "sidebar-detached sidebar-right";
                $layoutClasses['contentsidebarClass']  = "content-detached content-left";
                break;
            default:
                $layoutClasses['sidebarPositionClass'] = "";
                $layoutClasses['contentsidebarClass']  = "";
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }

    /**
     * @param mixed       $datetime
     * @param string|null $tz
     *
     * @return Carbon
     * @throws \InvalidArgumentException
     */
    public static function carbonize($datetime = NULL, $tz = NULL)
    {
        switch (TRUE) {
            case is_null($datetime):
                return new Carbon(NULL, $tz);
            case $datetime instanceof Carbon:
                $dt = clone $datetime;
                return is_null($tz) ? $dt : $dt->setTimezone($tz);
            case $datetime instanceof DateTimeInterface:
                $dt = new Carbon($datetime->format('Y-m-d H:i:s.u'), $datetime->getTimezone());
                return is_null($tz) ? $dt : $dt->setTimezone($tz);
            case is_numeric($datetime) && (string)(int)$datetime === (string)$datetime:
                return Carbon::createFromTimestamp((int)$datetime, $tz);
            case is_string($datetime) && strtotime($datetime) !== FALSE:
                $dt = new Carbon($datetime, $tz);
                return is_null($tz) ? $dt : $dt->setTimezone($tz);
            default:
                throw new \InvalidArgumentException(
                    "That is not a date time of any sort that I can deal with"
                );
        }
    }

    public static function getClassProgressBar($value)
    {
        if ($value >= 100) {
            return 'success';
        } else if ($value > 60) {
            return 'warning';
        } else {
            return 'danger';
        }
    }

    public static function getFotoPortal($cpf)
    {
        // remove caracteres especiais cpf
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        return "https://portal.evolusom.com.br/storage/users/fotos/avatar_$cpf.png";
    }
}
