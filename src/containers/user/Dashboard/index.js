import React, { Component } from 'react';

import Overview from './overview'
import Timeline from './timeline'
import Charts from './charts'
import CreateMeeting from '../Meetings/create'

import '../timeline.css';

class Dashboard extends Component {
    state = { modal: null }

    handleAddDeadline = (type) => {
        console.log("XX")
        if (type === "meeting") {
            console.log("XX")
            this.setState({modal: "addMeeting"})
        }
    }

    render() {
        return (  
            <div className="row">

                <div className="col-12">
                    <div className="contentBox">
                        <h2>Dashboard</h2>
                    </div>
                </div>

                <div className="col-12">
                    <Overview onAdd={this.handleAddDeadline}/>
                </div>

                <div className="col-12 col-md-6 col-xl-8">
                    <Charts />
                </div>

                <div className="o-timeline-container col-12 col-md-6 col-xl-4">
                    <Timeline />
                </div>

                {this.state.modal === "addMeeting" &&
                    <CreateMeeting />
                }

            </div>
        );
    }
}

export default Dashboard;