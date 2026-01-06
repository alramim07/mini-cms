{{-- 
Component: Form
Purpose: wrapper for forms with automatic CSRF and method spoofing management.
--}}

{{-- @props is used to:
- define which parameters a Blade component accepts
- set default values
- make the component flexible and reusable
It's like saying:
"This component accepts these variables, and if you don't provide them, I'll use these values."
In this case:

• 	the component accepts a property called action (URL where to send the form)
• 	accepts a property called method (request type (POST, PUT, DELETE, etc.))
• 	method has a default value = 'POST' --}}
@props(['action', 'method' => 'POST'])

<form action="{{ $action }}" method="{{ strtolower($method) === 'get' ? 'GET' : 'POST' }}"
    enctype="multipart/form-data" class="space-y-6">

    @csrf

    @if (!in_array(strtoupper($method), ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
