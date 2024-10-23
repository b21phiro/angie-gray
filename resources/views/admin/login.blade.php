@extends('layouts.default')

@section('content')

<div id="login">

    <header class="login-header">
        <x-logo />
    </header>

    <main>

        <form id="login-form" method="POST" action="/angie-gray/public/admin/login">

            @csrf

            <section>
                <h1>Logga in</h1>
                <p>Som inloggad kan du hantera din portfolio.</p>
            </section>

            @if ($errors->any())

                @if ($errors->has('invalid'))
                    <div class="notice error">
                        <x-icon.x-circle />
                        <section class="notice-section">
                            <h2>Sorry,</h2>
                            <p>I could not find that account! Maybe it does not exist or is deleted?</p>
                        </section>
                    </div>
                @elseif ($errors->has('email') || $errors->has('password'))
                    <div class="notice warn">
                        <x-icon.alert-circle />
                        <section class="notice-section">
                            <h2>Woopsie,</h2>
                            <p>You must enter your email <i>and</i> the password to in order to log in!</p>
                        </section>
                    </div>
                @else
                    <div class="notice error">
                        <x-icon.x-circle />
                        <section class="notice-section">
                            <h2>Oh no,</h2>
                            <p>Something went wrong on my side, I'm so sorry... please try again later!</p>
                        </section>
                    </div>
                @endif

            @endif

            <fieldset>

                <div class="input">
                    <label class="input-label" for="email">Email</label>
                    <input id="email" type="email" name="email" />
                    <label for="email" class="input-error-text">Felaktig email</label>
                </div>

                <div class="input">
                    <label class="input-label" for="password">Password</label>
                    <input id="password" type="password" name="password" />
                    <label for="password" class="input-error-text">Du måste fylla i ditt lösenord</label>
                </div>

            </fieldset>

            <label id="submitButton" for="submit" class="submit">
                <span>Logga in</span>
                <x-icon.arrow-right />
            </label>

            <input id="submit"
                   class="hidden"
                   type="submit"
                   name="submit"
                   value="Logga in"
                   aria-hidden="true"
            />

        </form>

    </main>

    <footer class="login-footer">
        <p>Gå <a href="/" title="Go to website">till webbsida</a></p>
    </footer>

</div>

@endsection
