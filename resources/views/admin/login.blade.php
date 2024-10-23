@extends('layouts.default')

@section('content')

<div id="login">

    <header class="login-header">
        <div>
            <span>Angie</span>
        </div>
    </header>

    <main>

        <form id="login-form" method="POST" action="/admin/login">

            @csrf

            <section>
                <h1>Logga in</h1>
                <p>Som inloggad kan du hantera din portfolio.</p>
            </section>

            <fieldset>

                <div class="input">
                    <label class="input-label" for="email">Email</label>
                    <input id="email" type="text" name="email" />
                    <label for="email" class="input-error-text">Felaktig email</label>
                </div>

                <div class="input">
                    <label class="input-label" for="password">Password</label>
                    <input id="password" type="password" name="password" />
                    <label for="password" class="input-error-text">Du måste fylla i ditt lösenord</label>
                </div>

            </fieldset>

            <label for="submit" class="submit">
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
