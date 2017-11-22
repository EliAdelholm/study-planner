import React, { Component } from 'react';

import UserNav from '../../components/UserNav'
import Dashboard from './Dashboard'
import Projects from './Projects'
import Archive from './Archive'
import Settings from './Settings'

class UserHome extends Component {
    state = {view: "dashboard"}

    handleView = (newView) => {
        this.setState({ view: newView})
    }

    render() {
        return (
            <div className="container-fluid">
                <div className="row">

                    <UserNav active={this.state.view} onClick={this.handleView} />


                    <div className="col-12 col-md-10 col-lg-11">
                        {this.state.view === "dashboard" &&
                            <Dashboard />
                        }

                        {this.state.view === "projects" && 
                            <Projects />
                        }

                        {this.state.view === "archive" && 
                            <Archive />
                        }

                        {this.state.view === "settings" && 
                            <Settings />
                        }
                    </div>

                </div>
            </div>
        );
    }
}

export default UserHome;