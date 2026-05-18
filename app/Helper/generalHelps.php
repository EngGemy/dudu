<?php

function getFolder()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

function getCurrentTemperature()
{
    $apiKey = '435d3a59618c9d159a8d5b4e99717db4';
    $city = 'Cairo'; // The city for which you want to get the temperature

    $client = new \GuzzleHttp\Client();
    $response = $client->get("http://api.weatherstack.com/current
    ?access_key=$apiKey&query=$city");

    $data = json_decode($response->getBody(), true);

    //    if(isset($data['main']['temp'])){
    //        $temperatureKelvin = $data['main']['temp'];
    //        $temperatureCelsius = $temperatureKelvin - 273.15;
    var_dump($data);
    //        return $data;
    //    } else {
    //        return 'Temperature data not available';
    //    }
}
function header_logo()
{
    $site_name = \App\Models\General_setting::select('id', 'site_logo_header')->first();
    $logo_header = $site_name->site_logo_header;

    return $logo_header;

}
function currency()
{
    $site_name = \App\Models\General_setting::select('id', 'currency')->first();
    $logo_header = $site_name->currency;

    return $logo_header;

}
function footer_logo()
{
    $site_name = \App\Models\General_setting::select('id', 'site_logo_footer')->first();
    $logo_header = $site_name->site_logo_footer;

    return $logo_header;

}
function uploadimage($folder, $photo)
{

    $destination = 'assets/images/'.$folder;
    $photo = $photo;
    $filename = $photo->hashName();
    $photo->move($destination, $filename);

    return $filename;

}
function delete_photo($photo)
{
    $path = public_path().'/'.$photo;
    $path = str_replace(project_url(), '', $path);
    $path = str_replace('public/public', 'public', $path);
    unlink($path);

}
function getYoutubeId($url)
{

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

    return isset($match[1]) ? $match[1] : null;

}
function getYoutubeThumbnail($link)
{
    if (app()->environment('local')) {
        return asset('assets/images/video-poster.jpeg');
    }

    $pattern = '%(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:[^/\n\r]+/)?(?:v/|e(?:mbed)?/|.*[?&]v=|.*[?&]vi=))([\w-]{11})%x';

    $url = preg_match($pattern, $link, $matches);

    if (! isset($matches[1])) {
        return asset('assets/images/video-poster.jpeg');
    }

    $thumbnailUrl = "https://img.youtube.com/vi/{$matches[1]}/maxresdefault.jpg";

    return $thumbnailUrl;
}
function project_url()
{
    return 'https://cynor.main-dev.com';
}

/**
 * Generate an asset path for the application.
 *
 * @param  string  $path
 * @param  bool|null  $secure
 * @return string
 */
if (! function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = 'active')
    {
        foreach ($routes as $route) {
            if (\Illuminate\Support\Facades\Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}

function check_exist_photo($photo)
{
    if (file_exists(str_replace(project_url(), public_path(), $photo))) {
        return true;
    } else {
        return false;
    }
}
function CKEDITOR()
{
    if (app()->getLocale() == 'zh') {
        return 'zh';
    } else {
        return 'en';
    }
}

function upload_video($video, $file)
{
    $videoName = time().rand(1, 9999).'.'.$video->getClientOriginalExtension();
    $path = $video->storeAs($file, $videoName, 'uploads');

    return 'uploads/'.$path;
}

function upload_pdf($pdf, $file)
{
    $pdfName = time().rand(1, 9999).'.'.$pdf->getClientOriginalExtension();
    $path = $pdf->storeAs($file, $pdfName, 'uploads');

    return 'uploads/'.$path;
}

function get_lang($model, $key)
{
    $local = $model->translations()->where('locale', app()->getLocale())->first();

    if ($local) {
        $trans = $local->$key ?? null;
    } else {
        $fallbackTranslation = $model->translations()->where('locale', 'en')->first();
        $trans = $fallbackTranslation ? $fallbackTranslation->$key : null;
    }

    return $trans;
}
