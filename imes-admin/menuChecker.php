<?php

class MenuChecker {

  public static function getMenu($pointer=null) 
  {
    $menu = [
      'dashboard.php'         => false, 
      'users.php'             => false,     
      'company.php'           => false,     
      'student_activity.php'  => false,     
      'index.php'             => false,
      'school.php'             => false,
      'departments.php'       => false,
      'programs.php'       => false,
      ''                      => false,        
    ];

    if (array_key_exists($pointer, $menu)) {
      unset($menu);
      $pointer = trim(str_replace('.php', '', $pointer));
      $menu[$pointer] = true;
    } else {
      unset($menu);
      $pointer = trim(str_replace('.php', '', $pointer));
      if (strstr($pointer, 'user') || strstr($pointer, 'student_information')) {
        $menu['users'] = true;
      } elseif (strstr($pointer, 'dashboard')) {
        $menu['dashboard'] = true;
      } elseif (strstr($pointer, 'company')) {
        $menu['company'] = true;
      } elseif (strstr($pointer, 'student')) {
        $menu['student'] = true;
      } elseif (strstr($pointer, 'school')) {
        $menu['school'] = true;
      } elseif (strstr($pointer, 'departments')) {
        $menu['departments'] = true;
      } elseif (strstr($pointer, 'department')) {
        $menu['departments'] = true;
      } elseif (strstr($pointer, 'programs')) {
        $menu['programs'] = true;
      } elseif (strstr($pointer, 'program')) {
        $menu['programs'] = true;
      } elseif (strstr($pointer, 'index') || strstr($pointer, '/') || empty($pointer)) {
        $menu['login'] = true;
      }
    }

    return $menu; 
  }

  public static function getMenuTitle($pointer=null) 
  {
    $title = str_replace('_', ' ', $pointer);

    return ucwords(trim(str_replace('.php?id=1234567890', ' ', $title)));  
  }

}