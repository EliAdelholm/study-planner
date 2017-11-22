import React, { Component } from 'react';
import {connect} from 'react-redux';

//Import Actions
import * as UserActions from '../../actions/userActionCreator';

import GuestNav from '../../components/GuestNav';
import Main from './main.js';
import Login from './login.js';
import Signup from './signup.js';

class App extends Component {
  state = {view: "main"}

  async componentDidMount() {

  }

  changeView = (newView) => {
    this.setState({view: newView})
  }

  handleSignup = async(data) => {
        const {onSignup} = this.props;

        await onSignup(data);

};


  render() {
    return (
      <div className="container-fluid">
        <GuestNav view={this.state.view} newView={this.changeView}/>

        <div id="pageVisitorHome" className="page container-fluid">
          <div class="row justify-content-sm-center">

          {this.state.view === "main" &&
            <Main/>
          }

          {this.state.view === "login" &&
            <Login/>
          }

          {this.state.view === "signup" &&
            <Signup onSignup={this.handleSignup}/>
          }
            
          </div>
      </div>
    </div>
    );
  }
}

export default connect((state) => ({
    user: Object.values(state.users),
}), {
    onSignup: UserActions.createUser,
})(App);