import React, { Component } from 'react';


class Projects extends Component {

    render() {
        return (
            <div className="row">

                <div className="col-12">
                    <div className="contentBox">
                        <h2>Projects</h2>
                    </div>
                </div>

                <div className="col-12">
                    <div className="card-columns">

                        <div className="card contentBox">
                            <div className="card-block">
                                <h3 className="card-title">Project title</h3>
                                <p>Project type + course</p>
                                <p>Optional Description</p>
                                <p>Deadline</p>
                                <p>Goals</p>
                                <div className="card-footer" style={{backgroundColor: '#C91B26'}}>
                                    2 days overdue
                                </div>
                            </div>
                        </div>
                    
                        <div className="card contentBox">
                            <div className="card-block">
                            <h3 className="card-title">Project title</h3>
                            <p>Project type + course</p>
                            <p>Optional Description</p>
                            <p>Deadline</p>
                            <p>Goals</p>
                                <div className="card-footer" style={{backgroundColor: '#9C0F5F'}}>
                                   Due in 3 days
                                </div>
                            </div>
                        </div>

                        <div className="card contentBox">
                            <div className="card-header">
                                <h3>Project title</h3>
                            </div>
                            <div className="card-block">
                                <p>Project type + course</p>
                                <p>Optional Description</p>
                                <p>Deadline</p>
                                <p>Goals</p>
                            </div>
                            <div className="card-footer" style={{backgroundColor: '#9C0F5F'}}>
                                Due in 5 days
                            </div>
                        </div>

                        <div className="card contentBox">
                            <div className="card-block">
                                <h3 className="card-title">Project title</h3>
                                <p>Project type + course</p>
                                <p>Optional Description</p>
                                <p>Deadline</p>
                                <p>Goals</p>
                                <div className="card-footer" style={{backgroundColor: 'rgb(130, 49, 153)'}}>
                                    Due in 10 days
                                </div>
                            </div>
                        </div>

                        <div className="card contentBox">
                            <div className="card-block">
                                <h3 className="card-title">Project title</h3>
                                <p>Project type + course</p>
                                <p>Optional Description</p>
                                <p>Deadline</p>
                                <p>Goals</p>
                                <div className="card-footer" style={{backgroundColor: 'rgb(130, 49, 153)'}}>
                                    Due in 30 days
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            
            
        );
    }
}

export default Projects;