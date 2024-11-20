import { useState, useEffect } from 'react';
import './App.css';
import './assets/css/style.css';
import axios from 'axios';

function App() {
    // State to store the fetched data
    const [images, setImages] = useState([]);
    const [videos, setVideos] = useState([]);
    const [exchangeRates, setExchangeRates] = useState([]);
    const [profits, setProfits] = useState([]);
    const [exchangeRateDuration, setExchangeRateDuration] = useState(2000);
    const [profitDuration, setProfitDuration] = useState(2000);

    // Fetch data from API
    const apiUrl = 'https://dev.ailservers.com/sib-currency-tracker-backend/api/data'
    const fetchData = async () => {
        try {
            const { data } = await axios.get(apiUrl);
            // Set the state with the fetched data
            setImages(data.images);
            setVideos(data.videos);
            setExchangeRates(data.exchange_rates);
            setExchangeRateDuration(data.exchange_rate_duration);
            setProfits(data.profits);
            setProfitDuration(data.profit_duration);


        } catch (error) {
            console.log(error);
        }
    };

    // fetch data
    useEffect(() => {
        fetchData();
    }, [apiUrl]);

    // Handle carousel events and reload page after the last slide
    // useEffect(() => {
    //     const carouselElement = document.getElementById('carouselExampleInterval');
    //     const totalItems = document.querySelectorAll('.carousel-item').length;

    //     let currentIndex = 0;

    //     carouselElement.addEventListener('slid.bs.carousel', (event) => {
    //         currentIndex = event.to;

    //         if (currentIndex === totalItems - 1) {
    //             setTimeout(() => {
    //                 window.location.reload();
    //             }, event.relatedTarget.getAttribute('data-bs-interval'));
    //         }
    //     });

    //     return () => {
    //         carouselElement.removeEventListener('slid.bs.carousel', () => { });
    //     };

    // }, []);


    return (
        <>
            <div id="carouselExampleInterval" className="carousel slide" data-bs-ride="carousel">
                <div className="carousel-inner">

                    {/* Carousel item for Exchange Rates */}
                    <div className="carousel-item bg-primary active" data-bs-interval={exchangeRateDuration}>
                        <h1 className="text-danger text-center"
                            style={{ marginTop: '5vh', fontSize: 'calc(20px + 3vw)', marginBottom: '5vh' }}>
                            Foreign Currency Exchange Rate
                        </h1>
                        <div className="table-responsive" style={{ margin: '0 10vw' }}>
                            <table className="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th className='text-center'>Currency</th>
                                        <th>Code</th>
                                        <th>Buying (BDT)</th>
                                        <th>Selling (BDT)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {exchangeRates.map((rate, index) => (
                                        <tr key={index}>
                                            <td>
                                                <div className='d-flex justify-content-between'>
                                                    <span>{rate.currency_symbol}</span>
                                                    <span>{rate.currency_name}</span>
                                                    <span><img src={rate.currency_flag} height={'60'} width={'90'} alt={`${rate.currency_code} flag`} /></span>
                                                </div>
                                            </td>
                                            <td>{rate.currency_code}</td>
                                            <td>{rate.buying_rate}</td>
                                            <td>{rate.selling_rate}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {/* Carousel item for Profits */}
                    {profits.map((profit, index) => (
                        <div key={index} className="carousel-item bg-primary" data-bs-interval={profitDuration}>
                            <h1 className="text-danger text-center" style={{ marginTop: '5vh', fontSize: 'calc(20px + 3vw)', marginBottom: '5vh' }}>
                                {profit.title}
                            </h1>
                            <div className="table-responsive" style={{ margin: '0 10vw' }}>
                                <table className="table table-bordered table-striped">
                                    <tbody>
                                        {profit.profit_rates.map((rate, rateindex) => (
                                            <tr key={rateindex}>
                                                <td>{rate.profitRate_title}</td>
                                                <td>{rate.profitRate_rate}</td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    ))}


                    {/* Carousel item for Images */}
                    {images.map((image, index) => (
                        <div key={index} className="carousel-item" data-bs-interval={image.duration}>
                            <img src={image.image_url} className="d-block w-100" />
                        </div>
                    ))}

                    {/* Carousel item for Videos */}
                    {videos.map((video, index) => (
                        <div className="carousel-item" data-bs-interval={video.duration} key={index}>
                            <video
                                className="video-player"
                                autoPlay
                                muted
                                playsInline
                                onEnded={(e) => {
                                    e.target.currentTime = 0;
                                }}
                            >
                                <source src={video.video_url} type="video/mp4" />
                            </video>
                        </div>
                    ))}
                </div>
            </div>
        </>
    );
}

export default App;
