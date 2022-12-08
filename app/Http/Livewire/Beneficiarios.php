<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Beneficiario;

class Beneficiarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $idBeneficiario, $nombre, $rfc, $estatus;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.beneficiarios.view', [
            'beneficiarios' => Beneficiario::latest()
						->orWhere('id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('rfc', 'LIKE', $keyWord)
						->orWhere('estatus', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		// $this->idBeneficiario = null;
		$this->nombre = null;
		$this->rfc = null;
		// $this->estatus = null;
    }

    public function store()
    {
        $this->validate([
		// 'idBeneficiario' => 'required',
		'nombre' => 'required',
		'rfc' => 'required',
		// 'estatus' => 'required',
        ]);

        Beneficiario::create([ 
			// 'idBeneficiario' => $this-> idBeneficiario,
			'nombre' => $this-> nombre,
			'rfc' => $this-> rfc,
			// 'estatus' => $this-> estatus
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Beneficiario Successfully created.');
    }

    public function edit($id)
    {
        $record = Beneficiario::findOrFail($id);

        $this->selected_id = $id; 
		$this->id = $record-> id;
		$this->nombre = $record-> nombre;
		$this->rfc = $record-> rfc;
		$this->estatus = $record-> estatus;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		//'idBeneficiario' => 'required',
		'nombre' => 'required',
		'rfc' => 'required',
		//'estatus' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Beneficiario::find($this->selected_id);
            $record->update([ 
			'id' => $this-> id,
			'nombre' => $this-> nombre,
			'rfc' => $this-> rfc,
			'estatus' => $this-> estatus
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Beneficiario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Beneficiario::where('id', $id);
            $record->delete();
        }
    }
}
