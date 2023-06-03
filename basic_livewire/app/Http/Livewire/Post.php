<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;


class Post extends Component
{

    public  $name, $description ,$post_id;
    public $updatePost = false;

    //ໂຕກວດຈັບ validate
    protected $rules = [
        'name' =>'required',
        'description' => 'required'
    ];


    public function render()
    {
        $posts = Posts::select('id','name','description')->get();
        return view('livewire.post', compact('posts'))->layout('layouts.home');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
    }


    //validate
    public function store()
    {
        //===============ໃຊ້ວິທີນີ້ກໍ່ໄດ້======================
        // $validatedData = $this->validate([
        //     'name' => 'required|min:3',
        //     'description' => 'required|min:3',
        // ]);

        $this->validate();

        try{
            //create post
            Posts::create([
                'name' => $this -> name,
                'description' => $this -> description   
            ]);

            //Set Flash Message
            session()->flash('success','Post Created Succesfully 5555555');

            //Reset form filde after cteateing post
            $this->resetFields();

        }catch(\Exception $e){
            //set flash message
            session()->flash('error','someting goes wrong 5555555!!');

            //Reset form fields after createing post
            $this->resetFields();
            
        }

    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        $this->name = $post->name;
        $this->description = $post->description;
        $this->post_id = $post->id;
        $this->updatePost = true;
    }

    public function cancel()
    {
        $this->updatePost = false;
        $this->resetFields();
    }

    public function update()
    {
        //Validate request
        $this->validate();

        try{
            //Update post
            Posts::Find($this->post_id)->fill([
                'name'=>$this->name,
                'description'=>$this->description
            ])->save();

            session()->flash('success','pst Update Leo i sus 55555!!');

            $this->cancel();
       
        }catch(\Exception $e){
            session()->flash('error','somting error i sus !!');
            $this->cancel();
        }
    }

    public function destroy($id){
        try{
            Posts::Find($id)->delete();
            session()->flash('success','Post delete leo yah yah!!');
        }catch(\Exception $e){
            session()->flash('error',"someting goes wrong i sus 6666!!");
        }
    }

    protected $listeners = [
        'deletePost'=>'destroy'
    ];

    //===================ວິທີລົບແບບທີ2=======================
    
    // public function delete($id)
    // {
    //     try{
    //         $data = Posts::find($id);
    //         $data->delete();
    
    //         session()->flash('message', 'Data deleted successfully!');

    //     }catch(\Exception $e){
    //         session()->flash('error','Mun lop br dai der');
    //     }
    // }

}
