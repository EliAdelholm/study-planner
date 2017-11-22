import React, { Component } from 'react';
import { Doughnut, Line, Bar } from 'react-chartjs-2';

class Charts extends Component {
    constructor(props) {
        super(props);
        let doughnutData = {
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: ["#C91B26", "#9C0F5F", "#60047A"],
                borderColor: "#212529",
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
            }],
            fontColor: "#fff",
            labels: ['DNF', 'WIP', 'Done']
        };
        let lineData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "2017",
                borderColor: '#C91B26',
                data: [0, 0, 0, 0, 0, 0, 0, 5, 2, 2, 3, 5],
                lineTension: 0,
            },
            {
                label: "2018",
                borderColor: '#9C0F5F',
                data: [1, 0, 5, 2, 2, 3, 4, 5, 0, 0, 1, 3],
                lineTension: 0,
            }]
        };
        let barData = {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
        this.state = {
            doughnutData: doughnutData,
            lineData: lineData,
            barData: barData
        }
    }

    render() {
        return (
            <div className="row">

                <div className="col-12">
                    <div className="contentBox">
                        <h3>Productivity</h3>
                        <Line data={this.state.lineData} width={300} />
                    </div>
                </div>

                <div className="col-12 col-lg-6">
                    <div className="contentBox">
                        <h3>Finish Ratio</h3>
                        <Doughnut data={this.state.doughnutData} width={150} />
                    </div>
                </div>

                <div className="col-12 col-lg-6">
                    <div className="contentBox">
                        <h3>Chart.js Demo</h3>
                        <Bar data={this.state.barData} width={150} />
                    </div>
                </div>

            </div>
        );
    }
}

export default Charts;