 <!-- Modal -->
 @foreach ($data as $item)
 <div class="modal fade" id="fotoModal{{ $item->nim }}" tabindex="-1" role="dialog"
     aria-labelledby="fotoModal{{ $item->nim }}Label" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
         <!-- Add the modal-sm class for a smaller-sized modal -->
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="fotoModal{{ $item->nim }}Label">Foto Mahasiswa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <img src="{{ asset('storage/foto_mahasiswa/' . $item->foto) }}" alt="Foto Mahasiswa"
                     style="max-width: 100%;">
                 <div class="mt-3">
                     <strong>Nama:</strong> {{ $item->nama }}
                 </div>
                 <div>
                     <strong>NIM:</strong> {{ $item->nim }}
                 </div>
                 <div>
                     <strong>Jurusan:</strong> {{ $item->jurusan }}
                 </div>
                 <div>
                     <strong>UKT:</strong> {{ $item->ukt }}
                 </div>
             </div>
         </div>
     </div>
 </div>
@endforeach
<!-- End Modal -->
