--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: channel_Assignations_National; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE "channel_Assignations_National" (
    "ID_Channels_Assignations" integer NOT NULL,
    "ID_channel_assignation_national" integer NOT NULL
);


ALTER TABLE public."channel_Assignations_National" OWNER TO drupal;

--
-- Name: Channel_Assignations_National_ID_Channels_Assignations_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Channel_Assignations_National_ID_Channels_Assignations_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Channel_Assignations_National_ID_Channels_Assignations_seq" OWNER TO drupal;

--
-- Name: Channel_Assignations_National_ID_Channels_Assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Channel_Assignations_National_ID_Channels_Assignations_seq" OWNED BY "channel_Assignations_National"."ID_Channels_Assignations";


--
-- Name: Channel_Assignations_National_ID_Channels_Assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Channel_Assignations_National_ID_Channels_Assignations_seq"', 1, false);


--
-- Name: channel_Assignations_by_City; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE "channel_Assignations_by_City" (
    "ID_Channels_Assignations" integer NOT NULL,
    "ID_Cities" integer NOT NULL,
    "ID_Channels_Assignations_by_city" integer NOT NULL
);


ALTER TABLE public."channel_Assignations_by_City" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_City_ID_Channels_Assignations_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Channel_Assignations_by_City_ID_Channels_Assignations_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Channel_Assignations_by_City_ID_Channels_Assignations_seq" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_City_ID_Channels_Assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Channel_Assignations_by_City_ID_Channels_Assignations_seq" OWNED BY "channel_Assignations_by_City"."ID_Channels_Assignations";


--
-- Name: Channel_Assignations_by_City_ID_Channels_Assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Channel_Assignations_by_City_ID_Channels_Assignations_seq"', 1, false);


--
-- Name: Channel_Assignations_by_City_ID_Cities_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Channel_Assignations_by_City_ID_Cities_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Channel_Assignations_by_City_ID_Cities_seq" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_City_ID_Cities_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Channel_Assignations_by_City_ID_Cities_seq" OWNED BY "channel_Assignations_by_City"."ID_Cities";


--
-- Name: Channel_Assignations_by_City_ID_Cities_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Channel_Assignations_by_City_ID_Cities_seq"', 1, false);


--
-- Name: channel_Assignations_by_Departament; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE "channel_Assignations_by_Departament" (
    "ID_Channels_Assignations" integer NOT NULL,
    "ID_Departament" integer NOT NULL,
    "ID_Channels_Assignations_by_Departament" integer NOT NULL
);


ALTER TABLE public."channel_Assignations_by_Departament" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq" OWNED BY "channel_Assignations_by_Departament"."ID_Channels_Assignations";


--
-- Name: Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq"', 1, false);


--
-- Name: Channel_Assignations_by_Departament_ID_Departament_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Channel_Assignations_by_Departament_ID_Departament_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Channel_Assignations_by_Departament_ID_Departament_seq" OWNER TO drupal;

--
-- Name: Channel_Assignations_by_Departament_ID_Departament_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Channel_Assignations_by_Departament_ID_Departament_seq" OWNED BY "channel_Assignations_by_Departament"."ID_Departament";


--
-- Name: Channel_Assignations_by_Departament_ID_Departament_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Channel_Assignations_by_Departament_ID_Departament_seq"', 1, false);


--
-- Name: services_by_channel_assignation; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE services_by_channel_assignation (
    "ID_Services_by_channel_assignation" integer NOT NULL,
    "ID_Channels_assignations" integer NOT NULL,
    "ID_Services" integer NOT NULL
);


ALTER TABLE public.services_by_channel_assignation OWNER TO drupal;

--
-- Name: Services_by_channel_assignati_ID_Services_by_channel_assign_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Services_by_channel_assignati_ID_Services_by_channel_assign_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Services_by_channel_assignati_ID_Services_by_channel_assign_seq" OWNER TO drupal;

--
-- Name: Services_by_channel_assignati_ID_Services_by_channel_assign_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Services_by_channel_assignati_ID_Services_by_channel_assign_seq" OWNED BY services_by_channel_assignation."ID_Services_by_channel_assignation";


--
-- Name: Services_by_channel_assignati_ID_Services_by_channel_assign_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Services_by_channel_assignati_ID_Services_by_channel_assign_seq"', 1, false);


--
-- Name: Services_by_channel_assignation_ID_Channels_assignations_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Services_by_channel_assignation_ID_Channels_assignations_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Services_by_channel_assignation_ID_Channels_assignations_seq" OWNER TO drupal;

--
-- Name: Services_by_channel_assignation_ID_Channels_assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Services_by_channel_assignation_ID_Channels_assignations_seq" OWNED BY services_by_channel_assignation."ID_Channels_assignations";


--
-- Name: Services_by_channel_assignation_ID_Channels_assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Services_by_channel_assignation_ID_Channels_assignations_seq"', 1, false);


--
-- Name: Services_by_channel_assignation_ID_Services_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Services_by_channel_assignation_ID_Services_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Services_by_channel_assignation_ID_Services_seq" OWNER TO drupal;

--
-- Name: Services_by_channel_assignation_ID_Services_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Services_by_channel_assignation_ID_Services_seq" OWNED BY services_by_channel_assignation."ID_Services";


--
-- Name: Services_by_channel_assignation_ID_Services_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Services_by_channel_assignation_ID_Services_seq"', 1, false);


--
-- Name: territorial_divisions; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE territorial_divisions (
    "ID_Territorial_Division" integer NOT NULL,
    "Territorial_Division_Name" character(128)
);


ALTER TABLE public.territorial_divisions OWNER TO drupal;

--
-- Name: Territorial_Divisions_ID_Territorial_Division_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "Territorial_Divisions_ID_Territorial_Division_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Territorial_Divisions_ID_Territorial_Division_seq" OWNER TO drupal;

--
-- Name: Territorial_Divisions_ID_Territorial_Division_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "Territorial_Divisions_ID_Territorial_Division_seq" OWNED BY territorial_divisions."ID_Territorial_Division";


--
-- Name: Territorial_Divisions_ID_Territorial_Division_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"Territorial_Divisions_ID_Territorial_Division_seq"', 1, false);


--
-- Name: channel_Assignations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "channel_Assignations" (
    id_channels_assignations integer NOT NULL,
    id_operators integer NOT NULL,
    id_channels integer NOT NULL,
    id_city integer NOT NULL
);


ALTER TABLE public."channel_Assignations" OWNER TO postgres;

--
-- Name: channel_Assignations_National_ID_channel_assignation_nation_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "channel_Assignations_National_ID_channel_assignation_nation_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."channel_Assignations_National_ID_channel_assignation_nation_seq" OWNER TO drupal;

--
-- Name: channel_Assignations_National_ID_channel_assignation_nation_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "channel_Assignations_National_ID_channel_assignation_nation_seq" OWNED BY "channel_Assignations_National"."ID_channel_assignation_national";


--
-- Name: channel_Assignations_National_ID_channel_assignation_nation_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"channel_Assignations_National_ID_channel_assignation_nation_seq"', 1, false);


--
-- Name: channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq" OWNER TO drupal;

--
-- Name: channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq" OWNED BY "channel_Assignations_by_City"."ID_Channels_Assignations_by_city";


--
-- Name: channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq"', 1, false);


--
-- Name: channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq" OWNER TO drupal;

--
-- Name: channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq" OWNED BY "channel_Assignations_by_Departament"."ID_Channels_Assignations_by_Departament";


--
-- Name: channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq"', 1, false);


--
-- Name: channel_Assignations_by_Territorial_Division; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE "channel_Assignations_by_Territorial_Division" (
    "ID_Channels_Assignations" integer NOT NULL,
    "ID_Territorial_Division" integer NOT NULL,
    "ID_Channels_Assignations_by_Territorial_Division" integer NOT NULL
);


ALTER TABLE public."channel_Assignations_by_Territorial_Division" OWNER TO drupal;

--
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channel_assignations_id_channels_assignations_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_channels_assignations_seq OWNER TO postgres;

--
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channel_assignations_id_channels_assignations_seq OWNED BY "channel_Assignations".id_channels_assignations;


--
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channel_assignations_id_channels_assignations_seq', 1, false);


--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channel_assignations_id_channels_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_channels_seq OWNER TO postgres;

--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channel_assignations_id_channels_seq OWNED BY "channel_Assignations".id_channels;


--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channel_assignations_id_channels_seq', 1, false);


--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channel_assignations_id_city_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_city_seq OWNER TO postgres;

--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channel_assignations_id_city_seq OWNED BY "channel_Assignations".id_city;


--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channel_assignations_id_city_seq', 1, false);


--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channel_assignations_id_operators_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_operators_seq OWNER TO postgres;

--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channel_assignations_id_operators_seq OWNED BY "channel_Assignations".id_operators;


--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channel_assignations_id_operators_seq', 1, false);


--
-- Name: channels; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE channels (
    "ID_channels" integer NOT NULL,
    "ID_frequency_ranks" integer NOT NULL,
    channel_description character(128) NOT NULL,
    channes_max_assign integer NOT NULL,
    channel_number integer NOT NULL,
    "TxFrequency" integer NOT NULL,
    "RxFrequency" integer NOT NULL
);


ALTER TABLE public.channels OWNER TO postgres;

--
-- Name: channels_id_channels_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channels_id_channels_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channels_id_channels_seq OWNER TO postgres;

--
-- Name: channels_id_channels_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channels_id_channels_seq OWNED BY channels."ID_channels";


--
-- Name: channels_id_channels_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channels_id_channels_seq', 1, false);


--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE channels_id_frequency_ranks_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.channels_id_frequency_ranks_seq OWNER TO postgres;

--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE channels_id_frequency_ranks_seq OWNED BY channels."ID_frequency_ranks";


--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('channels_id_frequency_ranks_seq', 1, false);


--
-- Name: cities; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cities (
    "ID_cities" integer NOT NULL,
    city_name character(128) NOT NULL,
    "ID_departaments" integer NOT NULL
);


ALTER TABLE public.cities OWNER TO postgres;

--
-- Name: cities_id_cities_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cities_id_cities_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cities_id_cities_seq OWNER TO postgres;

--
-- Name: cities_id_cities_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cities_id_cities_seq OWNED BY cities."ID_cities";


--
-- Name: cities_id_cities_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cities_id_cities_seq', 1104, true);


--
-- Name: cities_id_departaments_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cities_id_departaments_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cities_id_departaments_seq OWNER TO postgres;

--
-- Name: cities_id_departaments_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cities_id_departaments_seq OWNED BY cities."ID_departaments";


--
-- Name: cities_id_departaments_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cities_id_departaments_seq', 1, false);


--
-- Name: departaments; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departaments (
    "ID_departament" integer NOT NULL,
    departament_name character(128) NOT NULL,
    "ID_Territorial_Division" integer NOT NULL
);


ALTER TABLE public.departaments OWNER TO postgres;

--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "departaments_ID_Territorial_Division_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."departaments_ID_Territorial_Division_seq" OWNER TO postgres;

--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "departaments_ID_Territorial_Division_seq" OWNED BY departaments."ID_Territorial_Division";


--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"departaments_ID_Territorial_Division_seq"', 34, true);


--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE departaments_id_departaments_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departaments_id_departaments_seq OWNER TO postgres;

--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE departaments_id_departaments_seq OWNED BY departaments."ID_departament";


--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('departaments_id_departaments_seq', 34, true);


--
-- Name: frequency_bands; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE frequency_bands (
    "ID_frequency_bands" integer NOT NULL,
    frequency_bands_name character(128) NOT NULL,
    frequency_bands_range character(128) NOT NULL,
    frequency_bands_wavelength character(128) NOT NULL
);


ALTER TABLE public.frequency_bands OWNER TO postgres;

--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE frequency_bands_id_frequency_bands_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.frequency_bands_id_frequency_bands_seq OWNER TO postgres;

--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE frequency_bands_id_frequency_bands_seq OWNED BY frequency_bands."ID_frequency_bands";


--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('frequency_bands_id_frequency_bands_seq', 8, true);


--
-- Name: frequency_ranks; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE frequency_ranks (
    "ID_frequency_ranks" integer NOT NULL,
    frequency_ranks_name character(128) NOT NULL,
    "ID_frequency_bands" integer NOT NULL,
    frequency_ranks_description character(512) NOT NULL,
    max_channels_per_operator integer NOT NULL,
    "frequency_begin_Hz" bigint NOT NULL,
    "frequency_end_Hz" bigint NOT NULL,
    channels_number integer NOT NULL
);


ALTER TABLE public.frequency_ranks OWNER TO postgres;

--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE frequency_ranks_id_frequency_bands_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.frequency_ranks_id_frequency_bands_seq OWNER TO postgres;

--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE frequency_ranks_id_frequency_bands_seq OWNED BY frequency_ranks."ID_frequency_bands";


--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('frequency_ranks_id_frequency_bands_seq', 1, false);


--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE frequency_ranks_id_frequency_ranks_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.frequency_ranks_id_frequency_ranks_seq OWNER TO postgres;

--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE frequency_ranks_id_frequency_ranks_seq OWNED BY frequency_ranks."ID_frequency_ranks";


--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('frequency_ranks_id_frequency_ranks_seq', 1, false);


--
-- Name: operators; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE operators (
    "ID_operators" integer NOT NULL,
    operators_name character(128) NOT NULL
);


ALTER TABLE public.operators OWNER TO postgres;

--
-- Name: operators_id_operators_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE operators_id_operators_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.operators_id_operators_seq OWNER TO postgres;

--
-- Name: operators_id_operators_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE operators_id_operators_seq OWNED BY operators."ID_operators";


--
-- Name: operators_id_operators_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('operators_id_operators_seq', 76, true);


--
-- Name: services; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE services (
    "ID_service" integer NOT NULL,
    services_name character(128) NOT NULL,
    services_description character(1024) NOT NULL
);


ALTER TABLE public.services OWNER TO postgres;

--
-- Name: services_by_frequency_ranks; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE services_by_frequency_ranks (
    "ID_Service_by_Frequency_Rank" integer NOT NULL,
    "ID_Service" integer NOT NULL,
    "ID_frequency_ranks" integer NOT NULL
);


ALTER TABLE public.services_by_frequency_ranks OWNER TO drupal;

--
-- Name: services_by_frequency_ranks_ID_Frequency_Ranks_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_frequency_ranks_ID_Frequency_Ranks_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_frequency_ranks_ID_Frequency_Ranks_seq" OWNER TO drupal;

--
-- Name: services_by_frequency_ranks_ID_Frequency_Ranks_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_frequency_ranks_ID_Frequency_Ranks_seq" OWNED BY services_by_frequency_ranks."ID_frequency_ranks";


--
-- Name: services_by_frequency_ranks_ID_Frequency_Ranks_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_frequency_ranks_ID_Frequency_Ranks_seq"', 1, false);


--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq" OWNER TO drupal;

--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq" OWNED BY services_by_frequency_ranks."ID_Service_by_Frequency_Rank";


--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq"', 1, false);


--
-- Name: services_by_frequency_ranks_ID_Service_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_frequency_ranks_ID_Service_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_frequency_ranks_ID_Service_seq" OWNER TO drupal;

--
-- Name: services_by_frequency_ranks_ID_Service_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_frequency_ranks_ID_Service_seq" OWNED BY services_by_frequency_ranks."ID_Service";


--
-- Name: services_by_frequency_ranks_ID_Service_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_frequency_ranks_ID_Service_seq"', 1, false);


--
-- Name: services_by_operator; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE services_by_operator (
    "ID_Services_by_Operator" integer NOT NULL,
    "ID_Operator" integer NOT NULL,
    "ID_Service" integer NOT NULL
);


ALTER TABLE public.services_by_operator OWNER TO drupal;

--
-- Name: services_by_operator_ID_Operator_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_operator_ID_Operator_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_operator_ID_Operator_seq" OWNER TO drupal;

--
-- Name: services_by_operator_ID_Operator_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_operator_ID_Operator_seq" OWNED BY services_by_operator."ID_Operator";


--
-- Name: services_by_operator_ID_Operator_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_operator_ID_Operator_seq"', 1, false);


--
-- Name: services_by_operator_ID_Services_by_Operator_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_operator_ID_Services_by_Operator_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_operator_ID_Services_by_Operator_seq" OWNER TO drupal;

--
-- Name: services_by_operator_ID_Services_by_Operator_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_operator_ID_Services_by_Operator_seq" OWNED BY services_by_operator."ID_Services_by_Operator";


--
-- Name: services_by_operator_ID_Services_by_Operator_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_operator_ID_Services_by_Operator_seq"', 1, false);


--
-- Name: services_by_operator_ID_Services_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_operator_ID_Services_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."services_by_operator_ID_Services_seq" OWNER TO drupal;

--
-- Name: services_by_operator_ID_Services_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_operator_ID_Services_seq" OWNED BY services_by_operator."ID_Service";


--
-- Name: services_by_operator_ID_Services_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_operator_ID_Services_seq"', 1, false);


--
-- Name: services_id_service_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE services_id_service_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.services_id_service_seq OWNER TO postgres;

--
-- Name: services_id_service_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE services_id_service_seq OWNED BY services."ID_service";


--
-- Name: services_id_service_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('services_id_service_seq', 42, true);


--
-- Name: id_channels_assignations; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations" ALTER COLUMN id_channels_assignations SET DEFAULT nextval('channel_assignations_id_channels_assignations_seq'::regclass);


--
-- Name: id_operators; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations" ALTER COLUMN id_operators SET DEFAULT nextval('channel_assignations_id_operators_seq'::regclass);


--
-- Name: id_channels; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations" ALTER COLUMN id_channels SET DEFAULT nextval('channel_assignations_id_channels_seq'::regclass);


--
-- Name: id_city; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations" ALTER COLUMN id_city SET DEFAULT nextval('channel_assignations_id_city_seq'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_National" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_National_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_channel_assignation_national; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_National" ALTER COLUMN "ID_channel_assignation_national" SET DEFAULT nextval('"channel_Assignations_National_ID_channel_assignation_nation_seq"'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_City" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_by_City_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_Cities; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_City" ALTER COLUMN "ID_Cities" SET DEFAULT nextval('"Channel_Assignations_by_City_ID_Cities_seq"'::regclass);


--
-- Name: ID_Channels_Assignations_by_city; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_City" ALTER COLUMN "ID_Channels_Assignations_by_city" SET DEFAULT nextval('"channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq"'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Departament" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_Departament; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Departament" ALTER COLUMN "ID_Departament" SET DEFAULT nextval('"Channel_Assignations_by_Departament_ID_Departament_seq"'::regclass);


--
-- Name: ID_Channels_Assignations_by_Departament; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Departament" ALTER COLUMN "ID_Channels_Assignations_by_Departament" SET DEFAULT nextval('"channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq"'::regclass);


--
-- Name: ID_channels; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY channels ALTER COLUMN "ID_channels" SET DEFAULT nextval('channels_id_channels_seq'::regclass);


--
-- Name: ID_cities; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cities ALTER COLUMN "ID_cities" SET DEFAULT nextval('cities_id_cities_seq'::regclass);


--
-- Name: ID_departaments; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cities ALTER COLUMN "ID_departaments" SET DEFAULT nextval('cities_id_departaments_seq'::regclass);


--
-- Name: ID_departament; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departaments ALTER COLUMN "ID_departament" SET DEFAULT nextval('departaments_id_departaments_seq'::regclass);


--
-- Name: ID_Territorial_Division; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departaments ALTER COLUMN "ID_Territorial_Division" SET DEFAULT nextval('"departaments_ID_Territorial_Division_seq"'::regclass);


--
-- Name: ID_frequency_bands; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequency_bands ALTER COLUMN "ID_frequency_bands" SET DEFAULT nextval('frequency_bands_id_frequency_bands_seq'::regclass);


--
-- Name: ID_frequency_ranks; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequency_ranks ALTER COLUMN "ID_frequency_ranks" SET DEFAULT nextval('frequency_ranks_id_frequency_ranks_seq'::regclass);


--
-- Name: ID_frequency_bands; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequency_ranks ALTER COLUMN "ID_frequency_bands" SET DEFAULT nextval('frequency_ranks_id_frequency_bands_seq'::regclass);


--
-- Name: ID_operators; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY operators ALTER COLUMN "ID_operators" SET DEFAULT nextval('operators_id_operators_seq'::regclass);


--
-- Name: ID_service; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY services ALTER COLUMN "ID_service" SET DEFAULT nextval('services_id_service_seq'::regclass);


--
-- Name: ID_Services_by_channel_assignation; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_channel_assignation ALTER COLUMN "ID_Services_by_channel_assignation" SET DEFAULT nextval('"Services_by_channel_assignati_ID_Services_by_channel_assign_seq"'::regclass);


--
-- Name: ID_Channels_assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_channel_assignation ALTER COLUMN "ID_Channels_assignations" SET DEFAULT nextval('"Services_by_channel_assignation_ID_Channels_assignations_seq"'::regclass);


--
-- Name: ID_Services; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_channel_assignation ALTER COLUMN "ID_Services" SET DEFAULT nextval('"Services_by_channel_assignation_ID_Services_seq"'::regclass);


--
-- Name: ID_Service_by_Frequency_Rank; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_frequency_ranks ALTER COLUMN "ID_Service_by_Frequency_Rank" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq"'::regclass);


--
-- Name: ID_Service; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_frequency_ranks ALTER COLUMN "ID_Service" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Service_seq"'::regclass);


--
-- Name: ID_frequency_ranks; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_frequency_ranks ALTER COLUMN "ID_frequency_ranks" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Frequency_Ranks_seq"'::regclass);


--
-- Name: ID_Services_by_Operator; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_operator ALTER COLUMN "ID_Services_by_Operator" SET DEFAULT nextval('"services_by_operator_ID_Services_by_Operator_seq"'::regclass);


--
-- Name: ID_Operator; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_operator ALTER COLUMN "ID_Operator" SET DEFAULT nextval('"services_by_operator_ID_Operator_seq"'::regclass);


--
-- Name: ID_Service; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_operator ALTER COLUMN "ID_Service" SET DEFAULT nextval('"services_by_operator_ID_Services_seq"'::regclass);


--
-- Name: ID_Territorial_Division; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY territorial_divisions ALTER COLUMN "ID_Territorial_Division" SET DEFAULT nextval('"Territorial_Divisions_ID_Territorial_Division_seq"'::regclass);


--
-- Data for Name: channel_Assignations; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: channel_Assignations_National; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: channel_Assignations_by_City; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: channel_Assignations_by_Departament; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: channel_Assignations_by_Territorial_Division; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: channels; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: departaments; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: frequency_bands; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO frequency_bands VALUES (1, 'Very Low Frecuency VLF                                                                                                          ', '3 - 30 kHz                                                                                                                      ', '100 - 10 Km.                                                                                                                    ');
INSERT INTO frequency_bands VALUES (2, 'Low Frecuency LF                                                                                                                ', '30 - 300 kHz                                                                                                                    ', '10 - 1 Km.                                                                                                                      ');
INSERT INTO frequency_bands VALUES (3, 'Médium Frecuency MF                                                                                                             ', '300 - 3000 kHz                                                                                                                  ', '1 - 0.1 Km.                                                                                                                     ');
INSERT INTO frequency_bands VALUES (4, 'High Frecuency HF                                                                                                               ', '3 - 30 MHz                                                                                                                      ', '0.1 - 0.01 Km.                                                                                                                  ');
INSERT INTO frequency_bands VALUES (5, 'Very High Frecuency VHF                                                                                                         ', '30 - 300 MHz                                                                                                                    ', '0.01 - 0.001 Km.                                                                                                                ');
INSERT INTO frequency_bands VALUES (6, 'Ultra High Frecuency UHF                                                                                                        ', '300 - 3000 MHz                                                                                                                  ', '0.001 - 0.0001 Km.                                                                                                              ');
INSERT INTO frequency_bands VALUES (7, 'Super High Frecuency SHF                                                                                                        ', '3 - 30 GHz                                                                                                                      ', '0.0001 - 0.00001 Km.                                                                                                            ');
INSERT INTO frequency_bands VALUES (8, 'Extremely High Frecuency EHF                                                                                                    ', '30 - 300 GHz                                                                                                                    ', '0.00001 - 0.000001 Km.                                                                                                          ');


--
-- Data for Name: frequency_ranks; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: operators; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO services VALUES (1, 'Servicio de radiocomunicación                                                                                                   ', 'Servicio definido en esta sección que implica la transmisión, la emisión o la recepción de ondas radioeléctricas para fines específicos de telecomunicación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ');
INSERT INTO services VALUES (2, 'Servicio Fijo                                                                                                                   ', 'Servicio de radiocomunicación entre puntos fijosdeterminados.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (3, 'Servicio Fijo por satélite                                                                                                      ', 'Servicio de radiocomunicación entre estaciones terrenas situadas en emplazamientos dados cuando se utilizan uno o más satélites; el emplazamiento dado puede ser un punto fijo determinado o cualquier punto fijo situado en una zona determinada; en algunos casos, este Servicio incluye enlaces entre satélites que pueden realizarse también dentro del  Servicio entre satélites; el Servicio Fijo por satélite puede también incluir  enlaces de conexión para otros servicios de radiocomunicación espacial.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ');
INSERT INTO services VALUES (4, 'Servicio entre satélites                                                                                                        ', 'Servicio de radiocomunicación que establece enlaces entre satélites artificiales.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ');
INSERT INTO services VALUES (5, 'Servicio de operaciones espaciales                                                                                              ', 'Servicio de radiocomunicación que concierne exclusivamente al funcionamiento de los vehículos espaciales, en particular el seguimiento espacial, la telemedida espacial y el telemando espacial.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ');
INSERT INTO services VALUES (6, 'Servicio Móvil                                                                                                                  ', 'Servicio de radiocomunicación entre estaciones móviles y estaciones terrestres o entre estaciones móviles (CV).                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (7, 'Servicio Móvil por satélite                                                                                                     ', 'Servicio de radiocomunicación:
– entre estaciones terrenas móviles y una o varias estaciones espaciales o entre estaciones espaciales utilizadas por este Servicio; o
– entre estaciones terrenas móviles por intermedio de una o varias  estaciones espaciales.
También pueden considerarse incluidos en este Servicio los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (8, 'Servicio Móvil terrestre                                                                                                        ', 'Servicio Móvil entre estaciones de base y estaciones móviles terrestres o entre estaciones móviles terrestres.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ');
INSERT INTO services VALUES (9, 'Servicio Móvil terrestre por satélite                                                                                           ', 'Servicio Móvil por satélite en el que  las estaciones terrenas móviles están situadas en tierra.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ');
INSERT INTO services VALUES (10, 'Servicio Móvil Marítimo                                                                                                         ', 'Servicio Móvil entre estaciones costeras y estaciones de barco, entre estaciones de barco, o entre estaciones de comunicaciones a bordo asociadas; también pueden considerarse incluidas en este Servicio las estaciones de embarcación o dispositivo de salvamento y las estaciones de radiobaliza de localización de siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');
INSERT INTO services VALUES (11, 'Servicio Móvil Marítimo por satélite                                                                                            ', 'Servicio Móvil por satélite en el que  las estaciones terrenas móviles están situadas a bordo de barcos; también pueden considerarse incluidas en este Servicio las estaciones de embarcación o  dispositivo de salvamento y las estaciones de radiobaliza de localización de  siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ');
INSERT INTO services VALUES (12, 'Servicio de operaciones portuarias                                                                                              ', 'Servicio Móvil Marítimo en un  puerto o en sus cercanías, entre estaciones costeras y estaciones de barco, o  entre estaciones de barco, cuyos mensajes se refieren únicamente a las  operaciones, movimiento y seguridad de los barcos y, en caso de urgencia, a la salvaguardia de las personas.Quedan excluidos de este Servicio los mensajes con carácter de correspondencia pública.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ');
INSERT INTO services VALUES (13, 'Servicio de movimiento de barcos                                                                                                ', 'Servicio de seguridad, dentro del Servicio Móvil Marítimo, distinto del Servicio de operaciones portuarias, entre estaciones costeras y estaciones de barco, o entre estaciones de barco, cuyos
mensajes se refieren únicamente a los movimientos de los barcos. Quedan excluidos de este Servicio los mensajes con carácter de correspondencia pública.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ');
INSERT INTO services VALUES (14, 'Servicio Móvil aeronáutico                                                                                                      ', 'Servicio Móvil entre estaciones aeronáuticas y estaciones de aeronave, o entre estaciones de aeronave, en el que también pueden participar las estaciones de embarcación o dispositivo de salvamento; también pueden considerarse incluidas en este Servicio las estaciones de radiobaliza de localización de siniestros que operen en las frecuencias de socorro y de urgencia designadas.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ');
INSERT INTO services VALUES (15, 'Servicio Móvil aeronáutico en rutas (R)                                                                                         ', 'Servicio Móvil aeronáutico reservado a  las comunicaciones aeronáuticas relativas a la seguridad y regularidad de los  vuelos, principalmente en las rutas nacionales o internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (16, 'Servicio Móvil aeronáutico fuera de rutas (OR)                                                                                  ', 'Servicio Móvil aeronáutico destinado  a asegurar las comunicaciones, incluyendo las relativas a la coordinación de los  vuelos, principalmente fuera de las rutas nacionales e internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ');
INSERT INTO services VALUES (17, 'Servicio Móvil aeronáutico por satélite                                                                                         ', 'Servicio Móvil por satélite en el  que las estaciones terrenas móviles están situadas a bordo de aeronaves;  también pueden considerarse incluidas en este Servicio las estaciones de  embarcación o dispositivo de salvamento y las estaciones de radiobaliza de   localización de siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (18, 'Servicio Móvil aeronáutico en rutas (R) por satélite                                                                            ', 'Servicio Móvil aeronáutico por  satélite reservado a las comunicaciones relativas a la seguridad y regularidad de  los vuelos, principalmente en las rutas nacionales o internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (19, 'Servicio Móvil aeronáutico fuera de rutas (OR) por satélite                                                                     ', 'Servicio Móvil aeronáutico por  satélite destinado a asegurar las comunicaciones, incluyendo las relativas a la  coordinación de los vuelos, principalmente fuera de las rutas nacionales e  internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');
INSERT INTO services VALUES (20, 'Servicio de Radiodifusión                                                                                                       ', 'Servicio de radiocomunicación cuyas emisiones se destinan a ser recibidas directamente por el público en general. Dicho Servicio abarca emisiones sonoras, de televisión o de otro género (CS).                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (21, 'Servicio de Radiodifusión por satélite                                                                                          ', 'Servicio de radiocomunicación en el cual las señales emitidas o retransmitidas por estaciones espaciales están  destinadas a la recepción directa por el público en general.  En el Servicio de Radiodifusión por satélite la expresión «recepción directa» abarca tanto la recepción individual como la recepción comunal.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ');
INSERT INTO services VALUES (22, 'Servicio de radiodeterminación                                                                                                  ', 'Servicio de radiocomunicación para fines de radiodeterminación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (23, 'Servicio de radiodeterminación por satélite                                                                                     ', 'Servicio de radiocomunicación para fines de radiodeterminación, y que implica la  utilización de una o más estaciones espaciales. Este Servicio puede incluir también los enlaces de conexión necesarios para su funcionamiento.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ');
INSERT INTO services VALUES (24, 'Servicio de radionavegación                                                                                                     ', 'Servicio de radiodeterminación para fines de radionavegación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (25, 'Servicio de radionavegación por satélite                                                                                        ', 'Servicio de radiodeterminación por satélite para fines de radionavegación. También pueden considerarse incluidos en este Servicio los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ');
INSERT INTO services VALUES (26, 'Servicio de radionavegación marítima                                                                                            ', 'Servicio de radionavegación destinado a los barcos y a su explotación en condiciones de seguridad.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');
INSERT INTO services VALUES (27, 'Servicio de radionavegación marítima por satélite                                                                               ', 'Servicio de radionavegación por satélite en el que las estaciones terrenas están situadas a  bordo de barcos.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (28, 'Servicio de radionavegación aeronáutica                                                                                         ', 'Servicio de radionavegación destinado a las aeronaves y a su explotación en condiciones de seguridad.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ');
INSERT INTO services VALUES (29, 'Servicio de radionavegación aeronáutica por satélite                                                                            ', ' Servicio deradionavegación por satélite en el que las estaciones terrenas están situadas a bordo de aeronaves.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (30, 'Servicio de radiolocalización                                                                                                   ', 'Servicio de radiodeterminación para fines de radiolocalización.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (31, 'Servicio de radiolocalización por satélite                                                                                      ', 'Servicio radiodeterminación por satélite utilizado para la radiolocalización. De Este Servicio puede incluir asimismo los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ');
INSERT INTO services VALUES (32, 'Servicio de ayudas a la meteorología                                                                                            ', 'Servicio de radiocomunicación destinado a las observaciones y sondeos utilizados en meteorología, con inclusión de la hidrología.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ');
INSERT INTO services VALUES (33, 'Servicio de exploración de la Tierra por satélite                                                                               ', 'Servicio de radiocomunicación entre estaciones terrenas y una o varias estaciones espaciales que puede incluir enlaces entre estaciones espaciales y en el que:
 – se obtiene información sobre las características de la Tierra y sus  fenómenos naturales, incluidos datos relativos al estado del medio ambiente, por medio de sensores activos o de sensores pasivos a bordo de satélites de la Tierra;
– se reúne información análoga por medio de plataformas situadas en el aire o sobre la superficie de la Tierra;
– dichas informaciones pueden ser distribuidas a estaciones terrenas dentro de un mismo sistema;
– puede incluirse asimismo la interrogación a las plataformas.Este Servicio puede incluir también los enlaces de conexión necesarios
para su explotación.                                                                                                                                                                                                                                                                          ');
INSERT INTO services VALUES (34, 'Servicio de meteorología por satélite                                                                                           ', 'Servicio de exploración de la Tierra por satélite con fines meteorológicos.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ');
INSERT INTO services VALUES (35, 'Servicio de frecuencias patrón y de señales horarias                                                                            ', ' Servicio de radiocomunicación para la transmisión de frecuencias especificadas, de señales horarias, o de ambas, de reconocida y elevada precisión, para fines científicos, técnicos y de otras clases, destinadas a la recepción general.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ');
INSERT INTO services VALUES (36, 'Servicio de frecuencias patrón y de señales horarias por satélite                                                               ', 'Servicio de radiocomunicación que utiliza estaciones espaciales situadas en satélites de la Tierra para los mismos fines que el Servicio de frecuencias patrón y de  señales horarias. Este Servicio puede incluir también los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');
INSERT INTO services VALUES (37, 'Servicio de investigación espacial                                                                                              ', 'Servicio de radiocomunicación que utiliza vehículos espaciales u otros objetos espaciales para fines de investigación científica o tecnológica.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ');
INSERT INTO services VALUES (38, 'Servicio de aficionados                                                                                                         ', 'Servicio de radiocomunicación que tiene por objeto la instrucción individual, la intercomunicación y los estudios técnicos, efectuado por aficionados, esto es, por personas debidamente autorizadas que se  interesan en la radiotecnia con carácter exclusivamente personal y sin fines de lucro.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ');
INSERT INTO services VALUES (39, 'Servicio de aficionados por satélite                                                                                            ', 'Servicio de radiocomunicación que utiliza estaciones espaciales situadas en satélites de la Tierra para los mismos fines que el Servicio de aficionados.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ');
INSERT INTO services VALUES (40, 'Servicio de radioastronomía                                                                                                     ', 'Servicio que entraña el empleo de la radioastronomía.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ');
INSERT INTO services VALUES (41, 'Servicio de seguridad                                                                                                           ', 'Todo Servicio radioeléctrico que se explote de manera permanente o temporal para garantizar la seguridad de la vida humana y la salvaguardia de los bienes.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ');
INSERT INTO services VALUES (42, 'Servicio especial                                                                                                               ', 'ervicio de radiocomunicación no definido en otro lugar de la presente sección, destinado exclusivamente a satisfacer necesidades determinadas de interés general y no abierto a la correspondencia                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');


--
-- Data for Name: services_by_channel_assignation; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: services_by_frequency_ranks; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: services_by_operator; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Data for Name: territorial_divisions; Type: TABLE DATA; Schema: public; Owner: drupal
--



--
-- Name: Channel_Assignations_National_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY "channel_Assignations_National"
    ADD CONSTRAINT "Channel_Assignations_National_pkey" PRIMARY KEY ("ID_Channels_Assignations");


--
-- Name: Channel_Assignations_by_City_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY "channel_Assignations_by_City"
    ADD CONSTRAINT "Channel_Assignations_by_City_pkey" PRIMARY KEY ("ID_Channels_Assignations");


--
-- Name: Channel_Assignations_by_Departament_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY "channel_Assignations_by_Departament"
    ADD CONSTRAINT "Channel_Assignations_by_Departament_pkey" PRIMARY KEY ("ID_Channels_Assignations");


--
-- Name: Primary_Key_assignations_channels; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT "Primary_Key_assignations_channels" PRIMARY KEY (id_channels_assignations);

ALTER TABLE "channel_Assignations" CLUSTER ON "Primary_Key_assignations_channels";


--
-- Name: Primary_Key_services_by_operator; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY services_by_operator
    ADD CONSTRAINT "Primary_Key_services_by_operator" PRIMARY KEY ("ID_Services_by_Operator");


--
-- Name: Services_by_channel_assignation_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY services_by_channel_assignation
    ADD CONSTRAINT "Services_by_channel_assignation_pkey" PRIMARY KEY ("ID_Services_by_channel_assignation");


--
-- Name: channel_Assignations_by_Territorial_Division_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY "channel_Assignations_by_Territorial_Division"
    ADD CONSTRAINT "channel_Assignations_by_Territorial_Division_pkey" PRIMARY KEY ("ID_Channels_Assignations_by_Territorial_Division");


--
-- Name: channels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY channels
    ADD CONSTRAINT channels_pkey PRIMARY KEY ("ID_channels");


--
-- Name: cities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY ("ID_cities");


--
-- Name: frequency_ranks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY frequency_ranks
    ADD CONSTRAINT frequency_ranks_pkey PRIMARY KEY ("ID_frequency_ranks");


--
-- Name: primary_ket_operators; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY operators
    ADD CONSTRAINT primary_ket_operators PRIMARY KEY ("ID_operators");


--
-- Name: primary_key_frequency_bands; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY frequency_bands
    ADD CONSTRAINT primary_key_frequency_bands PRIMARY KEY ("ID_frequency_bands");


--
-- Name: primery_key_departaments; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departaments
    ADD CONSTRAINT primery_key_departaments PRIMARY KEY ("ID_departament");


--
-- Name: primery_key_services; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY services
    ADD CONSTRAINT primery_key_services PRIMARY KEY ("ID_service");


--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_key; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY services_by_frequency_ranks
    ADD CONSTRAINT "services_by_frequency_ranks_ID_Service_by_Frequency_Rank_key" UNIQUE ("ID_Service_by_Frequency_Rank");


--
-- Name: territorial_Divisions_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY territorial_divisions
    ADD CONSTRAINT "territorial_Divisions_pkey" PRIMARY KEY ("ID_Territorial_Division");


--
-- Name: channel_assignations_id_channels_assignations_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX channel_assignations_id_channels_assignations_index ON "channel_Assignations" USING btree (id_channels_assignations);


--
-- Name: cities_id_cities_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX cities_id_cities_index ON cities USING btree ("ID_cities");


--
-- Name: departaments_id_departaments_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX departaments_id_departaments_index ON departaments USING btree ("ID_departament");


--
-- Name: frequency_bands_id_frequency_bands_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX frequency_bands_id_frequency_bands_index ON frequency_bands USING btree ("ID_frequency_bands");


--
-- Name: frequency_ranks_id_frequency_ranks_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX frequency_ranks_id_frequency_ranks_index ON frequency_ranks USING btree ("ID_frequency_ranks");


--
-- Name: operators_id_operators_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX operators_id_operators_index ON operators USING btree ("ID_operators");


--
-- Name: services_id_service_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX services_id_service_index ON services USING btree ("ID_service");


--
-- Name: Channel_Assignations_National_ID_Channels_Assignations_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_National"
    ADD CONSTRAINT "Channel_Assignations_National_ID_Channels_Assignations_fkey" FOREIGN KEY ("ID_Channels_Assignations") REFERENCES "channel_Assignations"(id_channels_assignations);


--
-- Name: Channel_Assignations_by_City_ID_Channels_Assignations_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_City"
    ADD CONSTRAINT "Channel_Assignations_by_City_ID_Channels_Assignations_fkey" FOREIGN KEY ("ID_Channels_Assignations") REFERENCES "channel_Assignations"(id_channels_assignations);


--
-- Name: Channel_Assignations_by_City_ID_Cities_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_City"
    ADD CONSTRAINT "Channel_Assignations_by_City_ID_Cities_fkey" FOREIGN KEY ("ID_Cities") REFERENCES cities("ID_cities");


--
-- Name: Channel_Assignations_by_Departame_ID_Channels_Assignations_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Departament"
    ADD CONSTRAINT "Channel_Assignations_by_Departame_ID_Channels_Assignations_fkey" FOREIGN KEY ("ID_Channels_Assignations") REFERENCES "channel_Assignations"(id_channels_assignations);


--
-- Name: Channel_Assignations_by_Departament_ID_Departament_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Departament"
    ADD CONSTRAINT "Channel_Assignations_by_Departament_ID_Departament_fkey" FOREIGN KEY ("ID_Departament") REFERENCES departaments("ID_departament");


--
-- Name: Services_by_channel_assignation_ID_Channels_assignations_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_channel_assignation
    ADD CONSTRAINT "Services_by_channel_assignation_ID_Channels_assignations_fkey" FOREIGN KEY ("ID_Channels_assignations") REFERENCES "channel_Assignations"(id_channels_assignations);


--
-- Name: Services_by_channel_assignation_ID_Services_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_channel_assignation
    ADD CONSTRAINT "Services_by_channel_assignation_ID_Services_fkey" FOREIGN KEY ("ID_Services") REFERENCES services("ID_service");


--
-- Name: channel_Assignations_by_Territoria_ID_Territorial_Division_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations_by_Territorial_Division"
    ADD CONSTRAINT "channel_Assignations_by_Territoria_ID_Territorial_Division_fkey" FOREIGN KEY ("ID_Territorial_Division") REFERENCES territorial_divisions("ID_Territorial_Division");


--
-- Name: channel_assignations_id_channels_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channel_assignations_id_channels_fkey FOREIGN KEY (id_channels) REFERENCES channels("ID_channels");


--
-- Name: channel_assignations_id_city_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channel_assignations_id_city_fkey FOREIGN KEY (id_city) REFERENCES cities("ID_cities");


--
-- Name: channels_assigment_by_operator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channels_assigment_by_operator FOREIGN KEY (id_operators) REFERENCES operators("ID_operators");


--
-- Name: channels_id_frequency_ranks_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY channels
    ADD CONSTRAINT channels_id_frequency_ranks_fkey FOREIGN KEY ("ID_frequency_ranks") REFERENCES frequency_ranks("ID_frequency_ranks");


--
-- Name: cities_by_departament; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_by_departament FOREIGN KEY ("ID_departaments") REFERENCES departaments("ID_departament");


--
-- Name: departaments_ID_Territorial_Division_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departaments
    ADD CONSTRAINT "departaments_ID_Territorial_Division_fkey" FOREIGN KEY ("ID_Territorial_Division") REFERENCES territorial_divisions("ID_Territorial_Division");


--
-- Name: frequency_bands_by_rank; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequency_ranks
    ADD CONSTRAINT frequency_bands_by_rank FOREIGN KEY ("ID_frequency_bands") REFERENCES frequency_bands("ID_frequency_bands");


--
-- Name: services_by_frequency_ranks_ID_Frequency_Ranks_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_frequency_ranks
    ADD CONSTRAINT "services_by_frequency_ranks_ID_Frequency_Ranks_fkey" FOREIGN KEY ("ID_frequency_ranks") REFERENCES frequency_ranks("ID_frequency_ranks");


--
-- Name: services_by_frequency_ranks_ID_Service_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_frequency_ranks
    ADD CONSTRAINT "services_by_frequency_ranks_ID_Service_fkey" FOREIGN KEY ("ID_Service") REFERENCES services("ID_service");


--
-- Name: services_by_operator_ID_Operator_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_operator
    ADD CONSTRAINT "services_by_operator_ID_Operator_fkey" FOREIGN KEY ("ID_Operator") REFERENCES operators("ID_operators");


--
-- Name: services_by_operator_ID_Services_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY services_by_operator
    ADD CONSTRAINT "services_by_operator_ID_Services_fkey" FOREIGN KEY ("ID_Service") REFERENCES services("ID_service");


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

