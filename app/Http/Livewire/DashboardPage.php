<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardPage extends Component
{
    public $books;
    public $is_modal_open, $is_delete_modal,$is_edit_modal = false;
    public $id_edit = 0;
    public $id_delete = 0;

    public $search = null;
    public $judul, $gambar, $persediaan, $pengarang, $penerbit;

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.dashboard-page');
    }

    public function clear_model(){
        $this->id_edit = 0;
        $this->id_delete = 0;
        $this->judul = null;
        $this->gambar = null;
        $this->persediaan = null;
        $this->pengarang = null;
        $this->penerbit = null;
    }

    use WithFileUploads;
    public function store(){
        $data = $this->validate([
            'judul' => 'required',
            'gambar' => 'required|image|max:2024',
            'persediaan' => 'required|integer',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        $file_name =$this->gambar->store('files','public');
        $data['gambar'] = $file_name;

        Book::create($data);

        $this->is_modal_open = false;
        $this->clear_model();
        $this->is_create_success= true;
    }

    public function get_edit($id){

        $result = Book::FindOrFail($id);
        $this->id_edit = $result['id'];
        $this->judul = $result['judul'];
        $this->gambar = $result['gambar'];
        $this->pengarang = $result['pengarang'];
        $this->penerbit = $result['penerbit'];
        $this->persediaan = $result['persediaan'];

        $this->open_edit_modal();
    }
    public function edit(){

        Book::where('id', $this->id_edit)
             ->update([
                    'judul' => $this->judul,
                    'gambar' => $this->gambar,
                    'pengarang' => $this->pengarang,
                    'penerbit' => $this->penerbit,
                    'persediaan' => $this->persediaan,
             ]);
        $this->close_modal();
    }

    public function search_query(){
            $this->books = "";

            $book = DB::table('books')
                ->where('judul', 'LIKE', "%.$this->search.%")
                ->get();
            $this->books = $book;
    }

    public function _delete(){
        $book = Book::find($this->id_delete);
        $book->delete();

        $this->close_modal();
    }

    public function open_modal(){
        $this->is_modal_open = true;
    }

    public function open_edit_modal(){
        $this->is_edit_modal = true;
    }
    public function open_delete_modal($id){
        $this->is_delete_modal = true;
        $this->id_delete = $id;
    }

    public function close_modal(){
        $this->clear_model();
        $this->is_modal_open = false;
        $this->is_edit_modal = false;
        $this->is_delete_modal = false;
    }
}
