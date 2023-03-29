@include('partials.header')

<h5>FILL THE FORMS TO ADD A NEW RECORD</h5>
<form action="/saveCustomer" method="POST">
    @csrf
    
 
<div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      name="firstName">
    
    </div>


    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      name="lastName">
   
    </div>



    <div class="mb-3">
      <label for="contactNumber" class="form-label">Contact Number</label>
      <input 
      type="text" 
      class="form-control" 
      id="exampleInputEmail1" 
      aria-describedby="emailHelp"
      name="contactNumber">
   
    </div>


    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      name="address">
      
    </div>    

 
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email Address</label>
      <input 
      type="email" 
      class="form-control" 
      id="exampleInputEmail1" 
      aria-describedby="emailHelp"
      name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    
       

    <button type="submit" class="btn btn-dark mb-3">Submit</button>
  </form>
