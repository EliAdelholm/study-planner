import React, { Component } from 'react';

class Login extends Component {

  render() {
    return (
      <div className="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
        <h2>Login</h2>
        <form id="frmLogin">
            <div class="form-group">
                <label>Email address</label>
                <input type="email" className="form-control" name="txtUserEmail" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" className="form-control" name="txtUserPassword" placeholder="Password" />
            </div>
            <p id="errorMessageLogin" className="text-danger"></p>
            <button id="btnLogin" type="button" class="btn btn-primary">Login</button>
        </form>
    </div>
    );
  }
}

export default Login;