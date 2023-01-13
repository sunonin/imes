<?php

class MenuChecker {

  public static function getMenu($pointer=null) 
  {
    $menu = [
      'dashboard.php'         => false, 
      'users.php'             => false,     
      'company.php'           => false,     
      'student_activity.php'  => false,     
      'profile.php'           => false,     
      'pre_ojt_requirements.php'           => false,     
      'journal.php'           => false,     
      'edit_activity.php'           => false,  
      'index.php'             => false,    
      'daily_time_record.php'             => false,    
      'post-ojt-requirements.php'             => false,    
      'assessment-link.php'             => false,    
      'generate-dtr.php'             => false,    
      ''             => false,    
    ];

    if (array_key_exists($pointer, $menu)) {
      unset($menu);
      $pointer = trim(str_replace('.php', '', $pointer));
      $menu[$pointer] = true;
    } else {
      unset($menu);
      $pointer = trim(str_replace('.php', '', $pointer));

      if (strstr($pointer, 'user')) {
        $menu['users'] = true;
      } elseif (strstr($pointer, 'dashboard')) {
        $menu['dashboard'] = true;
      } elseif (strstr($pointer, 'company')) {
        $menu['company'] = true;
      } elseif (strstr($pointer, 'student')) {
        $menu['student'] = true;
      } elseif (strstr($pointer, 'profile') || strstr($pointer, 'profile.php')) {
          $menu['profile'] = true;
      } elseif (strstr($pointer, 'pre_ojt_requirements')) {
        $menu['pre_ojt_requirements'] = true;
      } elseif (strstr($pointer, 'journal') || strstr($pointer, 'add_task') || strstr($pointer, 'edit_task')) {
        $menu['journal'] = true;
      } elseif (strstr($pointer, 'index') || strstr($pointer, '/') || empty($pointer)) {
        $menu['login'] = true;
      } elseif (strstr($pointer, 'post-ojt-requirements') || strstr($pointer, 'post-rating')) {
        $menu['post-ojt-requirements'] = true;
      } elseif (strstr($pointer, 'daily') || strstr($pointer, 'edit_dtr') || strstr($pointer, 'dtr') || strstr($pointer, 'daily_time_record.php')) {
        $menu['daily_time_record'] = true;
      } elseif (strstr($pointer, 'assessment') || strstr($pointer, 'link')) {
        $menu['assessment-link'] = true;
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