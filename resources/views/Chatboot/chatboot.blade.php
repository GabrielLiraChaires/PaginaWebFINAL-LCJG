@extends('layouts.app_chatboot')

@section('container')
    @if(isset($mensaje))
        <div class="alert alert-danger">
            {{ $mensaje }}
        </div>
    @endif
    <h1 class="text-center p-5">Bienvenido al ChatBoot de Ayuda</h1>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="{{route('Chatboot')}}" method="post" enctype="multipart/form-data" onsubmit="scrollToBottom()" class="redondeo-form">
            @csrf 
            <div class="form-group row">
                <div class="col-sm-8 p-4">
                    <label for="pregunta" class="col-form-label">Hazme una pregunta</label>
                    <input type="text" name="pregunta" id="pregunta" class="form-control caja-texto" value="{{old('pregunta')}}">
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-end mt-auto p-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                @error('pregunta')
                    <div class="col-sm-12 text-danger">{{$message}}</div>
                @enderror
            </div>
        </form>
        <div class="redondeo p-3" style="max-height: 300px; width: 50%; overflow-y: auto;" id="oldQuestionsContainer">
            <div id="oldquestions">
                <!-- Contenido existente -->
            </div>
            
            @if(isset($consulta))
                <div class="mt-2 bg-secondary rounded text-white" id="chatpregunta">
                    Tu: {{$consulta->Pregunta}}
                </div>
                <div class="mt-2 bg-light rounded" id="chatrespuesta">
                    Sistema: {{$consulta->Respuesta}}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        const checkResponse = () => {
            const pregunta = document.getElementById('chatpregunta')?.innerText || null;
            const respuesta = document.getElementById('chatrespuesta')?.innerText || null;
            if (pregunta && respuesta) {
                const questions = JSON.parse(sessionStorage.getItem('questions') || "[]");
                questions.push({ pregunta, respuesta });
                const preguntasparaguardar = JSON.stringify(questions);
                sessionStorage.setItem('questions', preguntasparaguardar);
                scrollToBottom();
            }
        }

        const loadOldQuestions = () => {
            const oldquestions = document.getElementById('oldquestions');
            const questions = JSON.parse(sessionStorage.getItem('questions') || "[]");
            let innerHTML = '';
            questions.forEach(element => {
                innerHTML += `
                <div class="form-group">
                    <div class="mt-2 bg-secondary rounded text-white"> ${element.pregunta}</div>
                    <div class="mt-2 rounded bg-light"> ${element.respuesta}</div>
                </div>
                `;
            });
            oldquestions.innerHTML = innerHTML;
            scrollToBottom();
        }

        const scrollToBottom = () => {
            const container = document.getElementById('oldQuestionsContainer');
            container.scrollTop = container.scrollHeight;
        }

        loadOldQuestions();
        checkResponse();
    </script>
@endsection
