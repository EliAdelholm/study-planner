import React, { Component } from 'react';

import Overview from './overview'
import Timeline from './timeline'
import Charts from './charts'

import '../timeline.css';

class Dashboard extends Component {

    render() {
        return (  
            <div className="row">

                <div className="col-12">
                    <div className="contentBox">
                        <h2>Dashboard</h2>
                    </div>
                </div>

                <div className="col-12">
                    <Overview />
                </div>

                <div className="col-12 col-md-6 col-xl-8">
                    <Charts />
                </div>

                <div className="o-timeline-container col-12 col-md-6 col-xl-4">
                    <Timeline />
                </div>

            </div>
        );
    }
}

export default Dashboard;