<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo List</title>
        <style>                                                   
        form {                                                    
            display: inline-block;                                
        }       
        .error {
            color: red;
        }                                                  
        </style>                                                  
    </head>                                                                                                                    
    <body>                                                        
        <main>                                                    
        <form method="POST" action="/new-task">
            @csrf                  
            <label for="add-task">Nouvelle tâche</label>          
            <input id="add-task" name="content" />                   
            <button>Ajouter</button>                              
        </form> 
        @error("content")
            <div class="error">Ce champ est requis</div>
        @enderror                                                  
        <ul>
            @foreach ($tasks as $task)
                <li>
                  {{ $task->content }}
                  <a href="/edit-task/{{ $task->id }}">Éditer</a>
                </li>
            @endforeach                                        
        </ul>                                                     
        </main>  
    </body>
</html>
