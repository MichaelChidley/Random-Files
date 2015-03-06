<?php


/*
-----------------------------------------------------------------------------------------------------------
File: postcodetolat.php
Version: 1.0
Release Date: 
-----------------------------------------------------------------------------------------------------------
Overview:       Method to convert a postcode into latitude and longitude for use with google maps
-----------------------------------------------------------------------------------------------------------
History:
10/08/2013      1.0	MJC	Created
-----------------------------------------------------------------------------------------------------------
Uses:

*/

function convert($postcode)
{
        $postcode = str_replace(' ','',$postcode);
        $file = @file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$postcode."&sensor=false");
         
                
        $data = json_decode($file, true);
        
        if($data['status'] != 'ZERO_RESULTS')
        {
                //var_dump($data);
                $lat = $data['results'][0]['geometry']['location']['lat'];
                $long = $data['results'][0]['geometry']['location']['lng'];
        
                return $lat.",".$long;
        }
        return false; 
}
?>