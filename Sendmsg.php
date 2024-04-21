
<?php include 'header.php'; ?>

<div class="container mt-5 border border-secondary rounded">
    <h1>Send Message</h1>
    <form>
      <div class="form-group mb-3">
        <label for="eventName">Event Name</label>
        <input type="text" class="form-control" id="eventName" placeholder="Enter event name">
      </div>
      <div class="form-group mb-3">
        <label for="eventDesc">Event Description</label>
        <textarea class="form-control" id="eventDesc" rows="3" placeholder="Enter event description"></textarea>
      </div>
      <div class="form-group mb-3">
        <label for="eventLogo">Event Logo</label>
        <input type="file" class="form-control-file" id="eventLogo">
      </div>
      <div class="form-group mb-3">
        <label for="recipientSelect">Select Recipient</label>
        <select class="form-control" id="recipientSelect">
          <option value="student">Student</option>
          <option value="teacher">Teacher</option>
          <option value="staff">Staff</option>
          <option value="all">All</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary mb-3" >Send Message</button>
    </form>
  </div>
  <div class="container mt-5 border border-secondary rounded">
    <h2 class="text-center"> Send List</h2>
    <table class="table border rounded-1 ">
    <thead class="bg-dark text-light">
        <tr>
          <th scope="col">Event Name</th>
          <th scope="col">Description</th>
          <th scope="col">Send Datetime</th>
          <th scope="col">User Type</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Event 1</td>
          <td>Description of Event 1</td>
          <td>2024-04-07 10:30:00</td>
          <td>Student</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm">Resend</button>
            <button type="button" class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
        <tr>
          <td>Event 2</td>
          <td>Description of Event 2</td>
          <td>2024-04-06 15:45:00</td>
          <td>Teacher</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm">Resend</button>
            <button type="button" class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
        <tr>
          <td>Event 3</td>
          <td>Description of Event 3</td>
          <td>2024-04-05 08:20:00</td>
          <td>All</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm">Resend</button>
            <button type="button" class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php include 'footer.php'; ?>