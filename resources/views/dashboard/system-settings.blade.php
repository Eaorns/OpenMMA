@include('dashboard.header')
<div class="border-bottom">
    <h2 class="pt-3 pb-2">System Settings</h2>
</div>
<div class="pt-3 px-3">
    @include('components.form', ['form_name' => 'site_name_form',
                                 'form_submit' => 'Save',
                                 'form_submit_right' => true,
                                 'form_target' => '/dashboard/system-settings',
                                 'form_fields' => [
                                    (object)array('type' => 'text', 'name' => 'value', 'required' => true, 'label' => 'Site name', 'default' => app('settings')['site.name']),
                                    (object)array('type' => 'hidden', 'name' => 'key', 'value' => 'site.name'),
                                 ]])
</div>
@include('dashboard.footer')