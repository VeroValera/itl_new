@extends('layouts.main')

@section('title', 'User Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>User Profile</h1>
                <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}" readonly>
                    </div>
                    <button type="button" id="editButton" class="btn btn-primary">Edit Profile</button>
                    <button type="submit" id="saveButton" class="btn btn-primary" style="display: none;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            var fields = ['name', 'address', 'phone'];
            fields.forEach(function(field) {
                document.getElementById(field).readOnly = false;
            });

            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'inline-block';
        });

        document.getElementById('phone').addEventListener('input', function(e) {
            var value = e.target.value;
            // Убираем все символы, кроме цифр
            value = value.replace(/[^\d]/g, '');

            // Добавляем префикс +7
            if (!value.startsWith('7')) {
                value = '7' + value;
            }


            value = value.substring(0, 11);

            // Обновляем поле ввода
            e.target.value = '+' + value;
        });
    </script>
@endsection
