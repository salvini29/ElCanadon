<div class="modal fade" id="modalreserva5">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Elija su opcion:</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('crearReserva5')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dia">Dia:</label>
                        <input type="text" class="form-control" name="dia" id="dia" value="">
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <select class="form-control" id="hora" name="hora">
                          <option>09-10</option>
                          <option>10-11</option>
                          <option>11-12</option>
                          <option>12-13</option>
                          <option>13-14</option>
                          <option>14-15</option>
                          <option>15-16</option>
                          <option>16-17</option>
                          <option>17-18</option>
                          <option>18-19</option>
                          <option>19-20</option>
                          <option>20-21</option>
                          <option>21-22</option>
                          <option>22-23</option>
                          <option>23-00</option>
                          <option>00-01</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pagar">Pagar:</label>
                        <select class="form-control" id="pagar" name="pagar">
                          <option>Pagar online</option>
                          {{-- <option>Pagar online</option> --}}
                        </select>
                    </div>
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="pagar" name="pagar"> 
                        <label class="form-check-label" for="pagar">Pagar</label>                      
                    </div> --}}
                    <br>
                    <button type="submit" class="btn btn-success">Reservar</button>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>