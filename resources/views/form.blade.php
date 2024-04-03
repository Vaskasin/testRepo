<!DOCTYPE html>
<html>
<head>
    <title>Translation Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Translation Form</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/submit" method="post" class="mt-4">
        @csrf

        <div class="form-group">
            <label for="firstname">{{ __("form.FirstName") }}</label>
            <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">
        </div>

        <div class="form-group">
            <label for="lastname">{{ __("form.LastName") }}</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
        </div>

        <div class="form-group">
            <label for="description">{{ __("form.Description") }}</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="lang">{{ __("form.Language") }}</label>
            <select name="lang" onchange="changeLanguage()" class="form-control">
                <option value="ru" @if(app()->getLocale() == 'ru') selected @endif>Russian</option>
                <option value="en" @if(app()->getLocale() == 'en') selected @endif>English</option>
                <option value="ru2" @if(app()->getLocale() == 'ru2') selected @endif>Russian 2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __("form.Submit") }}</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function changeLanguage() {
    let selectedLanguage = document.getElementsByName('lang')[0].value;
    window.location.href = '/' + selectedLanguage;
}
</script>

</body>
</html>