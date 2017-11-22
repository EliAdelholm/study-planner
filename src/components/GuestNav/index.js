import React, { Component } from 'react';

class GuestNav extends Component {

  render() {
    let view = this.props.view;
    let passiveTab = "navItem col-4 col-sm-3 col-md-2 col-lg-1";
    let activeTab = "navItem active col-4 col-sm-3 col-md-2 col-lg-1";

    return (
      <div id="navLogin" className="topNav container-fluid>">
        <div className="navHeader row"></div>
        <div className="navOptions row">
            <div className={ view === 'main' ? activeTab : passiveTab} onClick={() => this.props.newView("main")}>Home</div>
            <div className={ view === 'login' ? activeTab : passiveTab} onClick={() => this.props.newView("login")}>Login</div>
            <div className={ view === 'signup' ? activeTab : passiveTab} onClick={() => this.props.newView("signup")}>Signup</div>
            <div className="navItem d-none d-sm-block col-sm-3 col-md-6 col-lg-9"></div>
        </div>
    </div>
    );
  }
}

export default GuestNav;