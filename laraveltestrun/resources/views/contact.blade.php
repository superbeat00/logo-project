@extends('layouts.app')

@section('title-block')Страница контактов@endsection


@section('content')
    <h1>Страница контактов</h1>




    <form action="{{ route('contact-form')  }}" method="post">
        @csrf <!-- обязательный защ ключ -->

        <div class="form-group py-2">
            <label for="name">Введите имя</label>
            <input type="text" name="name" id="name" placeholder="Введите имя" class="form-control">
        </div>

        <div class="form-group py-2">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Введите email" class="form-control">
        </div>

        <div class="form-group py-2">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" id="subject" placeholder="Тема сообщения" class="form-control">
        </div>

        <div class="form-group py-2">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" placeholder="Введите сообщение" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Отправить</button>
    </form>
@endsection
