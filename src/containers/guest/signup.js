import React, { Component } from 'react';

class Signup extends Component {
    state = {
        name: "",
        email: "",
        password: "",
    }

    handleInputChange = (e) => {
        const target = e.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
          [name]: value
        });
    }

    handleSignup = () => {
        
        this.props.onSignup(this.state);
    }

  render() {
    return (
      <div className="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
        <h2>Sign up</h2>
        <form id="frmSignup" onChange={this.updateFormData}>
            <div class="form-group">
                <label>Username</label>
                <input type="text" className="form-control" value={this.state.name} name="name" onChange={this.handleInputChange} />
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" className="form-control" value={this.state.email} name="email" onChange={this.handleInputChange} />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" className="form-control" value={this.state.password} name="password" onChange={this.handleInputChange} />
            </div>
            <p id="errorMessageSignup" className="text-danger"></p>
            <button id="btnSignup" type="button" class="btn btn-primary" onClick={this.handleSignup}>Signup</button>
        </form>
    </div>
    );
  }
}

export default Signup;