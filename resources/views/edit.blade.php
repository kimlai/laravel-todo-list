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
          <form method="POST" action="">
            @csrf
            <label for="edit-task">Éditer la tâche</label>
            <input id="edit-task" name="content" value="{{ $task->content }}" />
            <button>Sauvegarder</button>
          </form>
          @error("content")
            <div class="error">Ce champ est requis</div>
          @enderror
        </main>
    </body>
</html>

