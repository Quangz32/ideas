<div  style="background-color: blue; padding: 10px; color: white; display: flex">
    <div style='width:40%'>
        <h2>Freelancer Manage System</h2>
        <h4>Username: {{1}}</h4>
        <h4>Your role: {{2}}</h4>

    </div>
    <div style='width:60%; display:flex; justify-content: space-around; font-size: 20px' > 
        <a href="/admin/show/user" style='color: white' >All User ( only admin)</a>
        <a href="/filter" style='color: white' >Filter</a>
        <a href="/login" style='color: white' >Logout</a>
        <a href="/self/edit" style='color: white'>Edit my info</a>
    
    </div>
    <div style="position: relative; display: none;">
    <!-- Nội dung của khối div -->
        <p style="position: absolute; bottom: 0; right: 0;">*: need ADMIN_ROLE to access</p>
    </div>
    
</div>