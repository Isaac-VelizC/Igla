
<div class="card">
    <div class="card-header">
       <h3 class="block-title">Listado de Estudiantes</h3>
    </div>
    <div class="card-body p-0">
       <div class="table-responsive pricing pt-2">
          <table id="my-table" class="table mb-0">
             <tbody>
                @if (count($estudiantes) > 0)
                   @foreach ($estudiantes as $estud)
                      <tr>
                         <th scope="row">{{ "{$estud->persona->nombre} {$estud->persona->ap_paterno} {$estud->persona->ap_materno}" }}</th>
                         <td class="text-center child-cell">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path  d="M23 7L6.44526 17.8042C5.85082 18.1921 5.0648 17.9848 4.72059 17.3493L1 10.4798" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                         </td>
                         <td class="text-center child-cell active">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M23 7L6.44526 17.8042C5.85082 18.1921 5.0648 17.9848 4.72059 17.3493L1 10.4798" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                         </td>
                         <td class="text-center child-cell">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M23 7L6.44526 17.8042C5.85082 18.1921 5.0648 17.9848 4.72059 17.3493L1 10.4798" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                         </td>
                      </tr>
                   @endforeach
                @else
                   <div class="text-center">
                      <p>No hay estudiantes inscritos</p>
                   </div>
                @endif
             </tbody>
          </table>
       </div>
    </div>
 </div>  