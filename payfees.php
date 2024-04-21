<?php include 'header.php'; ?>
<div class="container border border-secondary rounded">
  <h1 class="mt-4 mb-4">Pay Student Fees</h1>
  <div class="row">
    <div class="col-md-6">
      <form>
        <div class="form-group mb-3">
          <label for="studentName">Student Name</label>
          <input type="text" class="form-control" id="studentName" placeholder="Enter student name">
        </div>
        <div class="form-group mb-3">
          <label for="Depositor">Depositor Name</label>
          <input type="text" class="form-control" id="Depositor" placeholder="Enter Depositor name">
        </div>
        <div class="mb-3">
          <label for="student-Class" class="form-label">Class</label>
          <select class="form-select" id="student-Class">
            <option selected>Select Class</option>
            <option value="nursery">Nursery</option>
            <option value="lkg">LKG</option>
            <option value="ukg">UKG</option>
            <option value="class-1">Class 1</option>
            <option value="class-2">Class 2</option>
            <option value="class-3">Class 3</option>
            <option value="class-4">Class 4</option>
            <option value="class-5">Class 5</option>
            <option value="class-6">Class 6</option>
            <option value="class-7">Class 7</option>
            <option value="class-8">Class 8</option>
            <option value="class-9">Class 9</option>
            <option value="class-10">Class 10</option>
            <option value="class-11">Class 11</option>
            <option value="class-12">Class 12</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="section" class="form-label">Section</label>
          <select class="form-select" id="section">
          <option selected>Select Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="feesAmount">Fees Amount</label>
          <input type="number" class="form-control" id="feesAmount" placeholder="Enter fees amount">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="paymentDate">Payment Due Date</label>
          <input type="date" class="form-control" id="paymentDate">
        </div>
        <div class="form-group mb-3">
          <label for="totalPaid">Total Paid</label>
          <input type="number" class="form-control" id="totalPaid" placeholder="Enter total amount paid">
        </div>
        <div class="form-group mb-3">
          <label for="duePayment">Due Payment</label>
          <input type="number" class="form-control" id="duePayment" readonly>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="status" id="onlineRadio" value="online">
          <label class="form-check-label" for="onlineRadio">
            Online
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="status" id="offlineRadio" value="offline" checked="checked">
          <label class="form-check-label" for="offlineRadio">
            Offline
          </label>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3" style="width: 100%;">Pay Fees</button>
  </form> 
</div>
<?php include 'footer.php'; ?>
