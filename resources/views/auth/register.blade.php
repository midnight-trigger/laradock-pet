@extends('layouts.app')
@section('title', 'Signup')
@section('content')
<div class="auth-container">
  <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <h1 class="section-title">{{ __('Signup') }}</h1>
    <div class="title-line"></div>

    <!-- Name -->
    <label for="name" class="form-label">{{ __('Name') }}</label><span class="form-required">Required</span>
    <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror

    <!-- Gender -->
    <label for="gender" class="form-label">{{ __('Gender') }}</label><br>
    <input type="radio" class="form-radio @error('gender') is-invalid @enderror" name="gender" value="1" autocomplete="gender">Man
    <input type="radio" class="form-radio @error('gender') is-invalid @enderror" name="gender" value="2" autocomplete="gender">Woman
    <input type="radio" class="form-radio @error('gender') is-invalid @enderror" name="gender" value="3" autocomplete="gender">Other<br>

    <!-- Age -->
    <label for="age" class="form-label">{{ __('Age') }}</label><br>
    <div class="cp_ipselect cp_sl04">
      <select id="age" class="form-select @error('age') is-invalid @enderror" name="age" autocomplete="age">
        <option value="" selected>Choose Below</option>
        @for ($i = 0; $i <= 130; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>

    <!-- Prefecture -->
    <label for="prefecture_id" class="form-label">{{ __('Prefecture') }}</label><span class="form-required">Required</span><br>
    <div class="cp_ipselect cp_sl04">
      <select id="prefecture_id" class="form-select @error('prefecture_id') is-invalid @enderror" name="prefecture_id" autocomplete="prefecture_id">
        <option value="" selected>Choose Below</option>
        @foreach ($prefectures as $prefecture)
        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
        @endforeach
      </select>
    </div>
    @error('prefecture_id')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror

    <!-- Email -->
    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label><span class="form-required">Required</span><br>
    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror

    <!-- Password -->
    <label for="password" class="form-label">{{ __('Password') }}</label><span class="form-required">Required</span><br>
    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password" autofocus>
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label><span class="form-required">Required</span><br>
    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">

    <!-- Submit -->
    <button type="submit" class="form-submit">{{ __('Signup') }}</button>
  </form>
</div>
@endsection
