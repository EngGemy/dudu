<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Mail\EmailManager;
use App\Models\General_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $setting = General_setting::first();

        return view('dashboard.settings.edit', compact('setting'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(SettingRequest $request, $id)
    {
        try {
            $setting = General_setting::first();

            if ($request->has('site_logo_icon')) {
                if ($setting->site_logo_icon != null and File::exists('assets/images/settings/'.$setting->site_logo_icon)) {
                    $photo = delete_photo($setting->site_logo_icon);
                    $filename_icon = uploadimage('settings', $request->site_logo_icon);
                    $setting->update(['site_logo_icon' => $filename_icon]);
                } else {
                    $filename_icon = uploadimage('settings', $request->site_logo_icon);
                    $setting->update(['site_logo_icon' => $filename_icon]);
                }
            }

            if ($request->has('site_logo_header')) {
                if ($setting->site_logo_header != null and File::exists('assets/images/settings/'.$setting->site_logo_header)) {
                    $photo = delete_photo($setting->site_logo_header);
                    $filename = uploadimage('settings', $request->site_logo_header);
                    General_setting::where('id', $setting->id)->update(['site_logo_header' => $filename]);
                }
                $filename = uploadimage('settings', $request->site_logo_header);
                General_setting::where('id', $setting->id)->update(['site_logo_header' => $filename]);
            }

            if ($request->has('site_logo_footer')) {
                if ($setting->site_logo_footer != null and File::exists('assets/images/settings/'.$setting->site_logo_footer)) {
                    $photo = delete_photo($setting->site_logo_footer);
                    $filename = uploadimage('settings', $request->site_logo_footer);
                    General_setting::where('id', $setting->id)->update(['site_logo_footer' => $filename]);
                }
                $filename = uploadimage('settings', $request->site_logo_footer);
                General_setting::where('id', $setting->id)->update(['site_logo_footer' => $filename]);
            }

            $data = $request->except('_token', 'site_logo_header', 'site_logo_footer', 'id', 'site_logo_icon');
            $data = $this->injectTranslations($data, ['site_name', 'opening_words', 'Tags', 'address', 'location']);
            $setting->update($data);

            return redirect()->route('settings.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('settings.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function overWriteEnvFile($type, $val)
    {
        if (env('DEMO_MODE') != 'On') {
            $path = base_path('.env');
            if (file_exists($path)) {
                $val = '"'.trim($val).'"';
                if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                    file_put_contents($path, str_replace(
                        $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                    ));
                } else {
                    file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
                }
            }
        }
    }

    public function smtp_settings()
    {
        return 'dddd';

        return view('dashboard.settings.smtp_settings');
    }

    public function testEmail(Request $request)
    {
        $array['view'] = 'emails.newsletter';
        $array['subject'] = 'SMTP Test';
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['content'] = 'This is a test email.';

        try {
            Mail::to($request->email)->queue(new EmailManager($array));
        } catch (\Exception $e) {
            dd($e);
        }

        return back()->with(['success' => 'An email has been sent.']);
    }

    private function injectTranslations(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $values = $data[$field] ?? [];
            unset($data[$field]);
            foreach ($values as $locale => $value) {
                if (! isset($data[$locale])) {
                    $data[$locale] = [];
                }
                $data[$locale][$field] = $value;
            }
        }

        return $data;
    }
}
