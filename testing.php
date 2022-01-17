<?php 
    if(isset($_POST['cmds2'])){
        print_r($_POST);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpine Js</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
 
    <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
  
     <hr>


    <div x-data="{ show: false }">
        <button @click="show = !show">toggle</button>
        <h1 x-show="show">Alpine Js is working !</h1>
    </div>
    <hr>

    <div x-data>
        <button @click="alert('Alpine Js is working !')">Click</button>
    </div>
   

    <hr>

    <div x-data="{ count: 0 }">
    <button x-on:click="count++">Increment</button>
         <span x-text="count"></span>
    </div>

    <hr>


    <div x-data="{ isOpen: false }">
        <button @click=" isOpen = !isOpen">toggle too</button>
        <h1 x-show="isOpen">index.html</h1>
    </div>

     <hr>

<div class="container py-4" x-data="addRemove()">
  <h1 class="h5 text-center mb-4">Add Remove Dynamically with Alpine.js</h1>
  <hr>
  <form  method="post" action="" x-on:submit.stop.prevent="addRemoveSubmit">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="first">First</label>
        <input type="text" required="" class="form-control" id="text" aria-describedby="text" x-model="newFirst">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="last">Last</label>
        <input type="text" required="" class="form-control" id="last" aria-describedby="last" x-model="newLast">
      </div>
    </div>
    <div class="col-2 d-flex align-items-end">
      <div class="form-group col px-0">
        <button  class="btn btn-primary btn-block">Add</button>
      </div>
    </div>
  </div>

    <!-- <div class="row">
            <div class="col-md-4">
                <input type="submit" name="cmds" id="cmds">
            </div>
    </div> -->

  </form>
  <table class="table table-bordered mt-2 mb-4">
    <thead>
      <tr>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <template x-for="(person, index) in Object.values(persons)" :key="index">
        <form method="post">
        <tr>
          <td x-text="person.first"></td>
          <td x-text="person.last"></td>
          <td><button x-on:click="persons = persons.filter(p => p.id !== person.id)" class="btn btn-danger btn-block">Remove</button></td>
        </tr>
      </template>
                <input type="submit" name="cmds2" id="cmds2">

        </form>
    </tbody>
  </table>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script type="text/javascript">
    function randId() {
  return (Math.random() * 100).toFixed(0);
}

function addRemove() {
  return { 
    newFirst: '', 
    newLast: '', 
    persons: '', 
    addRemoveSubmit() {
      this.persons = [].concat({ 
        id: randId(), 
        first: this.newFirst, 
        last: this.newLast
      }, this.persons); this.newFirst = '', this.newLast = '';
    }
  }
}
</script>
</body>

</html>