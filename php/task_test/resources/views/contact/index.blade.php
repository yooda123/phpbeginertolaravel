@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('contact.create') }}" role="button">新規登録</a>
                    indexです

                    <form method="GET" action="{{ route('contact.index') }}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search" value="{{ $search }}" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                    </form>

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">氏名</th>
                            <th scope="col">しめい</th>
                            <th scope="col">件名</th>
                            <th scope="col">登録日時</th>
                            <th scope="col">詳細</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($contacts as $contact)
                          <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->your_name }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td><a href="{{ route('contact.show', ['id' => $contact->id])}}">詳細を見る</a></td>
                          </tr>
                        @endforeach

                        </tbody>
                      </table>

                      {{ $contacts->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
