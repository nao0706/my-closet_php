<?php

  function sanitize($before){

      foreach($before as $key => $value){

          $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');

      }
      return $after;
  }

  function pulldown_year(){

    print('<select name="year">');
   
    print('<option value="">--</option>');
/* foreachの書き方*/ 
    foreach(range(2020,2030) as $year){

      print('<option value="'.$year.'">'.$year.'</option>');

    }

    print('</select>');
  }

  function pulldown_month(){

    print('<select name="month">');
    print('<option value="">--</option>');
    foreach(range(1,12) as $month){
  
            print('<option value="'.str_pad($month,2,0,STR_PAD_LEFT).'"> '.str_pad($month,2,0,STR_PAD_LEFT).'</option>');
            
        }
        
    print('</select>');
    //.sprintf('%02d', $month).でも可能
    //$res=str_pad($month,2,0,STR_PAD_LEFT)
    //var_dump($res);
  }

  function pulldown_day(){

    print('<select name="day">');
    print('<option value="">--</option>');
    foreach(range(1,31) as $day){
  
            print('<option value="'.str_pad($day,2,0,STR_PAD_LEFT).'"> '.str_pad($day,2,0,STR_PAD_LEFT).'</option>');
            
        }
    print('</select>');
    //.sprintf('%02d', $month).でも可能
    //$res=str_pad($month,2,0,STR_PAD_LEFT)
    //var_dump($res);
  }
?>