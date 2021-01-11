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

                    editです
                    <form action="{{ route('contact.update', ['id' => $contact->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="your_name">氏名</label>
                        <input type="text" class="form-control" name="your_name" id="your_name" value="{{ $contact->your_name }}" required />
                      </div>
                      <!-- <input type="checkbox" name="sports[]" value="野球">野球
                      <input type="checkbox" name="sports[]" value="テニス">テニス
                      <input type="checkbox" name="sports[]" value="サッカー">サッカー -->
                      <div class="form-group">
                        <label for="title">件名</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $contact->title }}" required />
                      </div>
                      <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $contact->email }}"/>
                      </div>
                      <div class="form-group">
                        <label for="url">ホームページ</label>
                        <input type="url" class="form-control" name="url" id="url" value="{{ $contact->url }}"/>
                      </div>
                      性別
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="inlineRadio1" name="gender" value="0" @if($contact->gender === 0) checked @endif >
                        <label class="form-check-label" for="inlineRadio1">男性</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="inlineRadio2" name="gender" value="1"  @if($contact->gender === 1) checked @endif >
                        <label class="form-check-label" for="inlineRadio2">女性</label>
                      </div>
                      <br/>
                      年齢
                      <select name="age" class="form-select" aria-label="Default select example">
                        <option value="">選択してください</option>
                        <option value="1" @if($contact->age === 1) selected @endif>～19歳</option>
                        <option value="2" @if($contact->age === 2) selected @endif>20～29歳</option>
                        <option value="3" @if($contact->age === 3) selected @endif>30～39歳</option>
                        <option value="4" @if($contact->age === 4) selected @endif>40～49歳</option>
                        <option value="5" @if($contact->age === 5) selected @endif>50～59歳</option>
                        <option value="6" @if($contact->age === 6) selected @endif>60歳～</option>
                      </select>
                      <br>
                      お問い合わせ内容
                      <textarea name="contact">{{ $contact->contact }}</textarea>
                      <br/>
                      <input class="btn btn-primary" type="submit" name="btn_confirm" value="更新する" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
