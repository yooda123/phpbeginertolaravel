<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactForm;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormData;
use Illuminate\Support\Facades\DB;



class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd($search);

        // Eloqent ORM
        // $contacts = ContactForm::all();

        // クエリビルダ―
        // $contacts = DB::table('contact_forms')->get();
        // $contacts = DB::table('contact_forms')
        // ->select('id', 'your_name', 'title')
        // ->get();

/*
        $query = DB::table('contact_forms')
        ->select('id', 'your_name', 'title', 'created_at');
        $contacts = $query->addSelect('your_name as name')
        // ->orderBy('created_at', 'desc')
        // ->orderBy('id')
        ->orderByRaw('created_at desc, id')
        // ->get();
        ->paginate(20);
*/

        $query = DB::table('contact_forms');

        // 検索フォーム
        $search = $request->input('search');
        if ($search !== null) {
            // 全角スペース->半角に
            $search_sprit = mb_convert_kana($search, 's');
            // 空白で区切る
            $search_split = preg_split("/[\s]+/", $search_sprit);
            // 単語でループ回す
            foreach ($search_split as $value) {
                $query->where('your_name', 'like', '%'.$value.'%');
            }
        }

        $query->select('id', 'your_name', 'title', 'created_at');
        $contacts = $query->addSelect('your_name as name')
        // ->orderBy('created_at', 'desc')
        // ->orderBy('id')
        ->orderByRaw('created_at desc, id')
        // ->get();
        ->paginate(20);

        // dd($contacts);

        // return view('contact.index', ['contacts' => $contacts]);
        return view('contact.index', compact('contacts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        // $request->validate([
        // ]);

        $contactForm = new ContactForm();
        //
        // $input = $request->all();
        $contactForm->your_name = $request->input('your_name');
        $contactForm->title = $request->input('title');
        $contactForm->email = $request->input('email');
        $contactForm->url = $request->input('url');
        $contactForm->gender = $request->input('gender');
        $contactForm->age = $request->input('age');
        $contactForm->contact = $request->input('contact');

        // dd($contactForm);

        $contactForm->save();

        return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        //
        // Eloqent ORM
        // $contacts = ContactForm::where('id', $id)->get();
        $contact = ContactForm::find($id);
        // $gender = $this->getGenderString($contact->gender);
        // $age = $this->getAgeString($contact->age);

        $gender = CheckFormData::checkGender($contact);
        $age = CheckFormData::checkAge($contact);

        return view('contact/show', compact('contact', 'gender', 'age'));
    }

/*
    private function getGenderString($value)
    {
        if ($value === 0) {
            return "男性";
        }
        if ($value === 1) {
            return "女性";
        }
    }

    private function getAgeString($value)
    {
        if ($value === 1) {
            return "～19歳";
        }
        if ($value === 2) {
            return "20～29歳";
        }
        if ($value === 3) {
            return "30～39歳";
        }
        if ($value === 4) {
            return "40～49歳";
        }
        if ($value === 5) {
            return "50～59歳";
        }
        if ($value === 6) {
            return "60歳～";
        }
    }
*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = ContactForm::find($id);

        return view('contact/edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contact = ContactForm::find($id);
        //
        // $input = $request->all();
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        // dd($contactForm);

        //★=> 変更があればupdate_at更新する。update()もこの点同じだが、ちょっとsave()と処理違う。
        $contact->save();
        // $contact->update();

        return redirect('contact/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
