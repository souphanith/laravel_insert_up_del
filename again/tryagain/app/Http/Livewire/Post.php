<?php

namespace App\Http\Livewire;

use App\Models\post as posts;

use Livewire\Component;

class Post extends Component
{
    public $name, $surname, $phone, $post_id;
    public $updatePost = false;
    public function render()
    {
        // $posts = posts::select('id','name','surname','phone')->get();
        $poststt = posts::all();
        return view('livewire.post',compact('poststt'))->layout('layouts.home');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'surname' => 'required',
            'phone' => 'required',
        ];
    }

    public function store()
    {
        $this->validate();

        try{
            $data = [
                'name' => $this->name,
                'surname' => $this->surname,
                'phone' => $this->phone
            ];
    
            //Insert data to table using Eloquent ORM
            posts::create($data);
    
            //Clear input fields
            $this->name = '';
            $this->surname = '';
            $this->phone = '';

            session()->flash('success','Post Created Succesfully 5555555');
            
        }catch(\Exception $e){
            session()->flash('error','post create error 55555 i sus');
        }   
    }
    // =================================================================

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        $this->name = $post->name;
        $this->surname = $post->surname;
        $this->phone = $post->phone;
        $this->post_id = $post->id;
        $this->updatePost = true;
    }

    public function resetFields()
    {
        $this->name = '';
        $this->surname = '';
        $this->phone = '';
    }

    public function cancel()
    {
        $this->updatePost = false;
        $this->resetFields();
    }

    public function update()
    {
            Posts::Find($this->post_id)->fill([
                'name'=>$this->name,
                'surname'=>$this->surname,
                'phone'=>$this->phone
            ])->save();

            $this->cancel(); 

          
    }

    public function deleteData($id)
    {
        $data = posts::find($id);
        $data->delete();
        session()->flash('message', 'Data deleted successfully.');
    }

 
}
