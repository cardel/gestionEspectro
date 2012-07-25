--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
-- Name: channel_Assignations; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE "channel_Assignations" (
    id_channels_assignations integer NOT NULL,
    id_operators integer NOT NULL,
    id_channels integer NOT NULL,
    id_city integer NOT NULL
);


ALTER TABLE public."channel_Assignations" OWNER TO drupal;

--
-- Name: channel_Assignations_National_ID_channel_assignation_nation_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "channel_Assignations_National_ID_channel_assignation_nation_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channel_assignations_id_channels_assignations_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_channels_assignations_seq OWNER TO drupal;

--
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channel_assignations_id_channels_assignations_seq OWNED BY "channel_Assignations".id_channels_assignations;


--
-- Name: channel_assignations_id_channels_assignations_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channel_assignations_id_channels_assignations_seq', 1, false);


--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channel_assignations_id_channels_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_channels_seq OWNER TO drupal;

--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channel_assignations_id_channels_seq OWNED BY "channel_Assignations".id_channels;


--
-- Name: channel_assignations_id_channels_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channel_assignations_id_channels_seq', 1, false);


--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channel_assignations_id_city_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_city_seq OWNER TO drupal;

--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channel_assignations_id_city_seq OWNED BY "channel_Assignations".id_city;


--
-- Name: channel_assignations_id_city_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channel_assignations_id_city_seq', 1, false);


--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channel_assignations_id_operators_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channel_assignations_id_operators_seq OWNER TO drupal;

--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channel_assignations_id_operators_seq OWNED BY "channel_Assignations".id_operators;


--
-- Name: channel_assignations_id_operators_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channel_assignations_id_operators_seq', 1, false);


--
-- Name: channels; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
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


ALTER TABLE public.channels OWNER TO drupal;

--
-- Name: channels_id_channels_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channels_id_channels_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channels_id_channels_seq OWNER TO drupal;

--
-- Name: channels_id_channels_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channels_id_channels_seq OWNED BY channels."ID_channels";


--
-- Name: channels_id_channels_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channels_id_channels_seq', 1, false);


--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE channels_id_frequency_ranks_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.channels_id_frequency_ranks_seq OWNER TO drupal;

--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE channels_id_frequency_ranks_seq OWNED BY channels."ID_frequency_ranks";


--
-- Name: channels_id_frequency_ranks_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('channels_id_frequency_ranks_seq', 1, false);


--
-- Name: cities; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE cities (
    "ID_cities" integer NOT NULL,
    city_name character(128) NOT NULL,
    "ID_departaments" integer NOT NULL
);


ALTER TABLE public.cities OWNER TO drupal;

--
-- Name: cities_id_cities_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE cities_id_cities_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cities_id_cities_seq OWNER TO drupal;

--
-- Name: cities_id_cities_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE cities_id_cities_seq OWNED BY cities."ID_cities";


--
-- Name: cities_id_cities_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('cities_id_cities_seq', 1104, true);


--
-- Name: cities_id_departaments_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE cities_id_departaments_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cities_id_departaments_seq OWNER TO drupal;

--
-- Name: cities_id_departaments_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE cities_id_departaments_seq OWNED BY cities."ID_departaments";


--
-- Name: cities_id_departaments_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('cities_id_departaments_seq', 1, false);


--
-- Name: departaments; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE departaments (
    "ID_departament" integer NOT NULL,
    departament_name character(128) NOT NULL,
    "ID_Territorial_Division" integer NOT NULL
);


ALTER TABLE public.departaments OWNER TO drupal;

--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "departaments_ID_Territorial_Division_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."departaments_ID_Territorial_Division_seq" OWNER TO drupal;

--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "departaments_ID_Territorial_Division_seq" OWNED BY departaments."ID_Territorial_Division";


--
-- Name: departaments_ID_Territorial_Division_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"departaments_ID_Territorial_Division_seq"', 34, true);


--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE departaments_id_departaments_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.departaments_id_departaments_seq OWNER TO drupal;

--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE departaments_id_departaments_seq OWNED BY departaments."ID_departament";


--
-- Name: departaments_id_departaments_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('departaments_id_departaments_seq', 34, true);


--
-- Name: frequency_bands; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE frequency_bands (
    "ID_frequency_bands" integer NOT NULL,
    frequency_bands_name character(128) NOT NULL,
    frequency_bands_range character(128) NOT NULL,
    frequency_bands_wavelength character(128) NOT NULL
);


ALTER TABLE public.frequency_bands OWNER TO drupal;

--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE frequency_bands_id_frequency_bands_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.frequency_bands_id_frequency_bands_seq OWNER TO drupal;

--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE frequency_bands_id_frequency_bands_seq OWNED BY frequency_bands."ID_frequency_bands";


--
-- Name: frequency_bands_id_frequency_bands_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('frequency_bands_id_frequency_bands_seq', 8, true);


--
-- Name: frequency_ranks; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
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


ALTER TABLE public.frequency_ranks OWNER TO drupal;

--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE frequency_ranks_id_frequency_bands_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.frequency_ranks_id_frequency_bands_seq OWNER TO drupal;

--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE frequency_ranks_id_frequency_bands_seq OWNED BY frequency_ranks."ID_frequency_bands";


--
-- Name: frequency_ranks_id_frequency_bands_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('frequency_ranks_id_frequency_bands_seq', 1, false);


--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE frequency_ranks_id_frequency_ranks_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.frequency_ranks_id_frequency_ranks_seq OWNER TO drupal;

--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE frequency_ranks_id_frequency_ranks_seq OWNED BY frequency_ranks."ID_frequency_ranks";


--
-- Name: frequency_ranks_id_frequency_ranks_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('frequency_ranks_id_frequency_ranks_seq', 1, false);


--
-- Name: operators; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE operators (
    "ID_operators" integer NOT NULL,
    operators_name character(128) NOT NULL
);


ALTER TABLE public.operators OWNER TO drupal;

--
-- Name: operators_id_operators_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE operators_id_operators_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.operators_id_operators_seq OWNER TO drupal;

--
-- Name: operators_id_operators_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE operators_id_operators_seq OWNED BY operators."ID_operators";


--
-- Name: operators_id_operators_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('operators_id_operators_seq', 76, true);


--
-- Name: services; Type: TABLE; Schema: public; Owner: drupal; Tablespace: 
--

CREATE TABLE services (
    "ID_service" integer NOT NULL,
    services_name character(128) NOT NULL,
    services_description character(1024) NOT NULL
);


ALTER TABLE public.services OWNER TO drupal;

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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq" OWNER TO drupal;

--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq" OWNED BY services_by_frequency_ranks."ID_Service_by_Frequency_Rank";


--
-- Name: services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq"', 2212, true);


--
-- Name: services_by_frequency_ranks_ID_Service_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_frequency_ranks_ID_Service_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
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
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."services_by_operator_ID_Services_by_Operator_seq" OWNER TO drupal;

--
-- Name: services_by_operator_ID_Services_by_Operator_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE "services_by_operator_ID_Services_by_Operator_seq" OWNED BY services_by_operator."ID_Services_by_Operator";


--
-- Name: services_by_operator_ID_Services_by_Operator_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('"services_by_operator_ID_Services_by_Operator_seq"', 184, true);


--
-- Name: services_by_operator_ID_Services_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE "services_by_operator_ID_Services_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
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
-- Name: services_id_service_seq; Type: SEQUENCE; Schema: public; Owner: drupal
--

CREATE SEQUENCE services_id_service_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.services_id_service_seq OWNER TO drupal;

--
-- Name: services_id_service_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: drupal
--

ALTER SEQUENCE services_id_service_seq OWNED BY services."ID_service";


--
-- Name: services_id_service_seq; Type: SEQUENCE SET; Schema: public; Owner: drupal
--

SELECT pg_catalog.setval('services_id_service_seq', 42, true);


--
-- Name: id_channels_assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations" ALTER COLUMN id_channels_assignations SET DEFAULT nextval('channel_assignations_id_channels_assignations_seq'::regclass);


--
-- Name: id_operators; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations" ALTER COLUMN id_operators SET DEFAULT nextval('channel_assignations_id_operators_seq'::regclass);


--
-- Name: id_channels; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations" ALTER COLUMN id_channels SET DEFAULT nextval('channel_assignations_id_channels_seq'::regclass);


--
-- Name: id_city; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations" ALTER COLUMN id_city SET DEFAULT nextval('channel_assignations_id_city_seq'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_National" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_National_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_channel_assignation_national; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_National" ALTER COLUMN "ID_channel_assignation_national" SET DEFAULT nextval('"channel_Assignations_National_ID_channel_assignation_nation_seq"'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_City" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_by_City_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_Cities; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_City" ALTER COLUMN "ID_Cities" SET DEFAULT nextval('"Channel_Assignations_by_City_ID_Cities_seq"'::regclass);


--
-- Name: ID_Channels_Assignations_by_city; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_City" ALTER COLUMN "ID_Channels_Assignations_by_city" SET DEFAULT nextval('"channel_Assignations_by_City_ID_Channels_Assignations_by_ci_seq"'::regclass);


--
-- Name: ID_Channels_Assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_Departament" ALTER COLUMN "ID_Channels_Assignations" SET DEFAULT nextval('"Channel_Assignations_by_Departamen_ID_Channels_Assignations_seq"'::regclass);


--
-- Name: ID_Departament; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_Departament" ALTER COLUMN "ID_Departament" SET DEFAULT nextval('"Channel_Assignations_by_Departament_ID_Departament_seq"'::regclass);


--
-- Name: ID_Channels_Assignations_by_Departament; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE "channel_Assignations_by_Departament" ALTER COLUMN "ID_Channels_Assignations_by_Departament" SET DEFAULT nextval('"channel_Assignations_by_Depar_ID_Channels_Assignations_by_D_seq"'::regclass);


--
-- Name: ID_channels; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE channels ALTER COLUMN "ID_channels" SET DEFAULT nextval('channels_id_channels_seq'::regclass);


--
-- Name: ID_cities; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE cities ALTER COLUMN "ID_cities" SET DEFAULT nextval('cities_id_cities_seq'::regclass);


--
-- Name: ID_departaments; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE cities ALTER COLUMN "ID_departaments" SET DEFAULT nextval('cities_id_departaments_seq'::regclass);


--
-- Name: ID_departament; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE departaments ALTER COLUMN "ID_departament" SET DEFAULT nextval('departaments_id_departaments_seq'::regclass);


--
-- Name: ID_Territorial_Division; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE departaments ALTER COLUMN "ID_Territorial_Division" SET DEFAULT nextval('"departaments_ID_Territorial_Division_seq"'::regclass);


--
-- Name: ID_frequency_bands; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE frequency_bands ALTER COLUMN "ID_frequency_bands" SET DEFAULT nextval('frequency_bands_id_frequency_bands_seq'::regclass);


--
-- Name: ID_frequency_ranks; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE frequency_ranks ALTER COLUMN "ID_frequency_ranks" SET DEFAULT nextval('frequency_ranks_id_frequency_ranks_seq'::regclass);


--
-- Name: ID_frequency_bands; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE frequency_ranks ALTER COLUMN "ID_frequency_bands" SET DEFAULT nextval('frequency_ranks_id_frequency_bands_seq'::regclass);


--
-- Name: ID_operators; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE operators ALTER COLUMN "ID_operators" SET DEFAULT nextval('operators_id_operators_seq'::regclass);


--
-- Name: ID_service; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services ALTER COLUMN "ID_service" SET DEFAULT nextval('services_id_service_seq'::regclass);


--
-- Name: ID_Services_by_channel_assignation; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_channel_assignation ALTER COLUMN "ID_Services_by_channel_assignation" SET DEFAULT nextval('"Services_by_channel_assignati_ID_Services_by_channel_assign_seq"'::regclass);


--
-- Name: ID_Channels_assignations; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_channel_assignation ALTER COLUMN "ID_Channels_assignations" SET DEFAULT nextval('"Services_by_channel_assignation_ID_Channels_assignations_seq"'::regclass);


--
-- Name: ID_Services; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_channel_assignation ALTER COLUMN "ID_Services" SET DEFAULT nextval('"Services_by_channel_assignation_ID_Services_seq"'::regclass);


--
-- Name: ID_Service_by_Frequency_Rank; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_frequency_ranks ALTER COLUMN "ID_Service_by_Frequency_Rank" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Service_by_Frequency_Rank_seq"'::regclass);


--
-- Name: ID_Service; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_frequency_ranks ALTER COLUMN "ID_Service" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Service_seq"'::regclass);


--
-- Name: ID_frequency_ranks; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_frequency_ranks ALTER COLUMN "ID_frequency_ranks" SET DEFAULT nextval('"services_by_frequency_ranks_ID_Frequency_Ranks_seq"'::regclass);


--
-- Name: ID_Services_by_Operator; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_operator ALTER COLUMN "ID_Services_by_Operator" SET DEFAULT nextval('"services_by_operator_ID_Services_by_Operator_seq"'::regclass);


--
-- Name: ID_Operator; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_operator ALTER COLUMN "ID_Operator" SET DEFAULT nextval('"services_by_operator_ID_Operator_seq"'::regclass);


--
-- Name: ID_Service; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE services_by_operator ALTER COLUMN "ID_Service" SET DEFAULT nextval('"services_by_operator_ID_Services_seq"'::regclass);


--
-- Name: ID_Territorial_Division; Type: DEFAULT; Schema: public; Owner: drupal
--

ALTER TABLE territorial_divisions ALTER COLUMN "ID_Territorial_Division" SET DEFAULT nextval('"Territorial_Divisions_ID_Territorial_Division_seq"'::regclass);


--
-- Data for Name: channel_Assignations; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY "channel_Assignations" (id_channels_assignations, id_operators, id_channels, id_city) FROM stdin;
\.


--
-- Data for Name: channel_Assignations_National; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY "channel_Assignations_National" ("ID_Channels_Assignations", "ID_channel_assignation_national") FROM stdin;
\.


--
-- Data for Name: channel_Assignations_by_City; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY "channel_Assignations_by_City" ("ID_Channels_Assignations", "ID_Cities", "ID_Channels_Assignations_by_city") FROM stdin;
\.


--
-- Data for Name: channel_Assignations_by_Departament; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY "channel_Assignations_by_Departament" ("ID_Channels_Assignations", "ID_Departament", "ID_Channels_Assignations_by_Departament") FROM stdin;
\.


--
-- Data for Name: channel_Assignations_by_Territorial_Division; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY "channel_Assignations_by_Territorial_Division" ("ID_Channels_Assignations", "ID_Territorial_Division", "ID_Channels_Assignations_by_Territorial_Division") FROM stdin;
\.


--
-- Data for Name: channels; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY channels ("ID_channels", "ID_frequency_ranks", channel_description, channes_max_assign, channel_number, "TxFrequency", "RxFrequency") FROM stdin;
\.


--
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY cities ("ID_cities", city_name, "ID_departaments") FROM stdin;
1	Medellin                                                                                                                        	3
2	Abejorral                                                                                                                       	3
3	Abriaqui                                                                                                                        	3
4	Alejandria                                                                                                                      	3
5	Amaga                                                                                                                           	3
6	Amalfi                                                                                                                          	3
7	Andes                                                                                                                           	3
8	Angelopolis                                                                                                                     	3
9	Angostura                                                                                                                       	3
10	Anori                                                                                                                           	3
11	Antioquia                                                                                                                       	3
12	Anza                                                                                                                            	3
13	Apartado                                                                                                                        	3
14	Arboletes                                                                                                                       	3
15	Argelia                                                                                                                         	3
16	Armenia                                                                                                                         	3
17	Barbosa                                                                                                                         	3
18	Belmira                                                                                                                         	3
19	Bello                                                                                                                           	3
20	Betania                                                                                                                         	3
21	Betulia                                                                                                                         	3
22	Bolivar                                                                                                                         	3
23	Briceño                                                                                                                         	3
24	Buritica                                                                                                                        	3
25	Caceres                                                                                                                         	3
26	Caicedo                                                                                                                         	3
27	Caldas                                                                                                                          	3
28	Campamento                                                                                                                      	3
29	Cañasgordas                                                                                                                     	3
30	Caracoli                                                                                                                        	3
31	Caramanta                                                                                                                       	3
32	Carepa                                                                                                                          	3
33	Carmen De Viboral                                                                                                               	3
34	Carolina                                                                                                                        	3
35	Caucasia                                                                                                                        	3
36	Chigorodo                                                                                                                       	3
37	Cisneros                                                                                                                        	3
38	Cocorna                                                                                                                         	3
39	Concepcion                                                                                                                      	3
40	Concordia                                                                                                                       	3
41	Copacabana                                                                                                                      	3
42	Dabeiba                                                                                                                         	3
43	Don Matias                                                                                                                      	3
44	Ebejico                                                                                                                         	3
45	El Bagre                                                                                                                        	3
46	Entrerrios                                                                                                                      	3
47	Envigado                                                                                                                        	3
48	Fredonia                                                                                                                        	3
49	Frontino                                                                                                                        	3
50	Giraldo                                                                                                                         	3
51	Girardota                                                                                                                       	3
52	Gomez Plata                                                                                                                     	3
53	Granada                                                                                                                         	3
54	Guadalupe                                                                                                                       	3
55	Guarne                                                                                                                          	3
56	Guatape                                                                                                                         	3
57	Heliconia                                                                                                                       	3
58	Hispania                                                                                                                        	3
59	Itagui                                                                                                                          	3
60	Ituango                                                                                                                         	3
61	Jardin                                                                                                                          	3
62	Jerico                                                                                                                          	3
63	La Ceja                                                                                                                         	3
64	La Estrella                                                                                                                     	3
65	La Pintada                                                                                                                      	3
66	La Union                                                                                                                        	3
67	Liborina                                                                                                                        	3
68	Maceo                                                                                                                           	3
69	Marinilla                                                                                                                       	3
70	Montebello                                                                                                                      	3
71	Murindo                                                                                                                         	3
72	Mutata                                                                                                                          	3
73	Nariño                                                                                                                          	3
74	Necocli                                                                                                                         	3
75	Nechi                                                                                                                           	3
76	Olaya                                                                                                                           	3
77	Peñol                                                                                                                           	3
78	Peque                                                                                                                           	3
79	Pueblorrico                                                                                                                     	3
80	Puerto Berrio                                                                                                                   	3
81	Puerto Nare                                                                                                                     	3
82	Puerto Triunfo                                                                                                                  	3
83	Remedios                                                                                                                        	3
84	Retiro                                                                                                                          	3
85	Rionegro                                                                                                                        	3
86	Sabanalarga                                                                                                                     	3
87	Sabaneta                                                                                                                        	3
88	Salgar                                                                                                                          	3
89	San Andres                                                                                                                      	3
90	San Carlos                                                                                                                      	3
91	San Francisco                                                                                                                   	3
92	San Jeronimo                                                                                                                    	3
93	San Jose De La Montaña                                                                                                          	3
94	San Juan De Uraba                                                                                                               	3
95	San Luis                                                                                                                        	3
96	San Pedro                                                                                                                       	3
97	San Pedro De Uraba                                                                                                              	3
98	San Rafael                                                                                                                      	3
99	San Roque                                                                                                                       	3
100	San Vicente                                                                                                                     	3
101	Santa Barbara                                                                                                                   	3
102	Santa Rosa De Osos                                                                                                              	3
103	Santo Domingo                                                                                                                   	3
104	Santuario                                                                                                                       	3
105	Segovia                                                                                                                         	3
106	Sonson                                                                                                                          	3
107	Sopetran                                                                                                                        	3
108	Tamesis                                                                                                                         	3
109	Taraza                                                                                                                          	3
110	Tarso                                                                                                                           	3
111	Titiribi                                                                                                                        	3
112	Toledo                                                                                                                          	3
113	Turbo                                                                                                                           	3
114	Uramita                                                                                                                         	3
115	Urrao                                                                                                                           	3
116	Valdivia                                                                                                                        	3
117	Valparaiso                                                                                                                      	3
118	Vegachi                                                                                                                         	3
119	Venecia                                                                                                                         	3
120	Vigia Del Fuerte                                                                                                                	3
121	Yali                                                                                                                            	3
122	Yarumal                                                                                                                         	3
123	Yolombo                                                                                                                         	3
124	Yondo                                                                                                                           	3
125	Zaragoza                                                                                                                        	3
126	Barranquilla                                                                                                                    	4
127	Baranoa                                                                                                                         	4
128	Campo De La Cruz                                                                                                                	4
129	Candelaria                                                                                                                      	4
130	Galapa                                                                                                                          	4
131	Juan De Acosta                                                                                                                  	4
132	Luruaco                                                                                                                         	4
133	Malambo                                                                                                                         	4
134	Manati                                                                                                                          	4
135	Palmar De Varela                                                                                                                	4
136	Piojo                                                                                                                           	4
137	Polo Nuevo                                                                                                                      	4
138	Ponedera                                                                                                                        	4
139	Puerto Colombia                                                                                                                 	4
140	Repelon                                                                                                                         	4
141	Sabanagrande                                                                                                                    	4
142	Sabanalarga                                                                                                                     	4
143	Santa Lucia                                                                                                                     	4
144	Santo Tomas                                                                                                                     	4
145	Soledad                                                                                                                         	4
146	Suan                                                                                                                            	4
147	Tubara                                                                                                                          	4
148	Usiacuri                                                                                                                        	4
149	Bogota D.C.                                                                                                                     	5
150	Cartagena                                                                                                                       	6
151	Achi                                                                                                                            	6
152	Altos Del Rosario                                                                                                               	6
153	Arenal                                                                                                                          	6
154	Arjona                                                                                                                          	6
155	Arroyohondo                                                                                                                     	6
156	Barranco De Loba                                                                                                                	6
157	Calamar                                                                                                                         	6
158	Cantagallo                                                                                                                      	6
159	Cicuco                                                                                                                          	6
160	Cordoba                                                                                                                         	6
161	Clemencia                                                                                                                       	6
162	El Carmen De Bolivar                                                                                                            	6
163	El Guamo                                                                                                                        	6
164	El Peñon                                                                                                                        	6
165	Hatillo De Loba                                                                                                                 	6
166	Magangue                                                                                                                        	6
167	Mahates                                                                                                                         	6
168	Margarita                                                                                                                       	6
169	Maria La Baja                                                                                                                   	6
170	Montecristo                                                                                                                     	6
171	Mompos                                                                                                                          	6
172	Morales                                                                                                                         	6
173	Pinillos                                                                                                                        	6
174	Regidor                                                                                                                         	6
175	Rio Viejo                                                                                                                       	6
176	San Cristobal                                                                                                                   	6
177	San Estanislao                                                                                                                  	6
178	San Fernando                                                                                                                    	6
179	San Jacinto                                                                                                                     	6
180	San Jacinto Del Cauca                                                                                                           	6
181	San Juan De Nepomuceno                                                                                                          	6
182	San Martin De Loba                                                                                                              	6
183	San Pablo                                                                                                                       	6
184	Santa Catalina                                                                                                                  	6
185	Santa Rosa                                                                                                                      	6
186	Santa Rosa Del Sur                                                                                                              	6
187	Simiti                                                                                                                          	6
188	Soplaviento                                                                                                                     	6
189	Talaigua Nuevo                                                                                                                  	6
190	Tiquisio                                                                                                                        	6
191	Turbaco                                                                                                                         	6
192	Turbana                                                                                                                         	6
193	Villanueva                                                                                                                      	6
194	Zambrano                                                                                                                        	6
195	Tunja                                                                                                                           	7
196	Almeida                                                                                                                         	7
197	Aquitania                                                                                                                       	7
198	Arcabuco                                                                                                                        	7
199	Belen                                                                                                                           	7
200	Berbeo                                                                                                                          	7
201	Beteitiva                                                                                                                       	7
202	Boavita                                                                                                                         	7
203	Boyaca                                                                                                                          	7
204	Briceño                                                                                                                         	7
205	Buenavista                                                                                                                      	7
206	Busbanza                                                                                                                        	7
207	Caldas                                                                                                                          	7
208	Campohermoso                                                                                                                    	7
209	Cerinza                                                                                                                         	7
210	Chinavita                                                                                                                       	7
211	Chiquinquira                                                                                                                    	7
212	Chiscas                                                                                                                         	7
213	Chita                                                                                                                           	7
214	Chitaraque                                                                                                                      	7
215	Chivata                                                                                                                         	7
216	Cienega                                                                                                                         	7
217	Combita                                                                                                                         	7
218	Coper                                                                                                                           	7
219	Corrales                                                                                                                        	7
220	Covarachia                                                                                                                      	7
221	Cubara                                                                                                                          	7
222	Cucaita                                                                                                                         	7
223	Cuitiva                                                                                                                         	7
224	Chiquiza                                                                                                                        	7
225	Chivor                                                                                                                          	7
226	Duitama                                                                                                                         	7
227	El Cocuy                                                                                                                        	7
228	El Espino                                                                                                                       	7
229	Firavitoba                                                                                                                      	7
230	Floresta                                                                                                                        	7
231	Gachantiva                                                                                                                      	7
232	Gameza                                                                                                                          	7
233	Garagoa                                                                                                                         	7
234	Guacamayas                                                                                                                      	7
235	Guateque                                                                                                                        	7
236	Guayata                                                                                                                         	7
237	Guican                                                                                                                          	7
238	Iza                                                                                                                             	7
239	Jenesano                                                                                                                        	7
240	Jerico                                                                                                                          	7
241	Labranzagrande                                                                                                                  	7
242	La Capilla                                                                                                                      	7
243	La Victoria                                                                                                                     	7
244	La Uvita                                                                                                                        	7
245	Villa De Leyva                                                                                                                  	7
246	Macanal                                                                                                                         	7
247	Maripi                                                                                                                          	7
248	Miraflores                                                                                                                      	7
249	Mongua                                                                                                                          	7
250	Mongui                                                                                                                          	7
251	Moniquira                                                                                                                       	7
252	Motavita                                                                                                                        	7
253	Muzo                                                                                                                            	7
254	Nobsa                                                                                                                           	7
255	Nuevo Colon                                                                                                                     	7
256	Oicata                                                                                                                          	7
257	Otanche                                                                                                                         	7
258	Pachavita                                                                                                                       	7
259	Paez                                                                                                                            	7
260	Paipa                                                                                                                           	7
261	Pajarito                                                                                                                        	7
262	Panqueba                                                                                                                        	7
263	Pauna                                                                                                                           	7
264	Paya                                                                                                                            	7
265	Paz Del Rio                                                                                                                     	7
266	Pesca                                                                                                                           	7
267	Pisba                                                                                                                           	7
268	Puerto Boyaca                                                                                                                   	7
269	Quipama                                                                                                                         	7
270	Ramiriqui                                                                                                                       	7
271	Raquira                                                                                                                         	7
272	Rondon                                                                                                                          	7
273	Saboya                                                                                                                          	7
274	Sachica                                                                                                                         	7
275	Samaca                                                                                                                          	7
276	San Eduardo                                                                                                                     	7
277	San Jose De Pare                                                                                                                	7
278	San Luis De Gaceno                                                                                                              	7
279	San Mateo                                                                                                                       	7
280	San Miguel De Sema                                                                                                              	7
281	San Pablo De Borbur                                                                                                             	7
282	Santana                                                                                                                         	7
283	Santa Maria                                                                                                                     	7
284	Santa Rosa De Viterbo                                                                                                           	7
285	Santa Sofia                                                                                                                     	7
286	Sativanorte                                                                                                                     	7
287	Sativasur                                                                                                                       	7
288	Siachoque                                                                                                                       	7
289	Soata                                                                                                                           	7
290	Socota                                                                                                                          	7
291	Socha                                                                                                                           	7
292	Sogamoso                                                                                                                        	7
293	Somondoco                                                                                                                       	7
294	Sora                                                                                                                            	7
295	Sotaquira                                                                                                                       	7
296	Soraca                                                                                                                          	7
297	Susacon                                                                                                                         	7
298	Sutamarchan                                                                                                                     	7
299	Sutatenza                                                                                                                       	7
300	Tasco                                                                                                                           	7
301	Tenza                                                                                                                           	7
302	Tibana                                                                                                                          	7
303	Tibasosa                                                                                                                        	7
304	Tinjaca                                                                                                                         	7
305	Tipacoque                                                                                                                       	7
306	Toca                                                                                                                            	7
307	Togui                                                                                                                           	7
308	Topaga                                                                                                                          	7
309	Tota                                                                                                                            	7
310	Tunungua                                                                                                                        	7
311	Turmeque                                                                                                                        	7
312	Tuta                                                                                                                            	7
313	Tutasa                                                                                                                          	7
314	Umbita                                                                                                                          	7
315	Ventaquemada                                                                                                                    	7
316	Viracacha                                                                                                                       	7
317	Zetaquira                                                                                                                       	7
318	Manizales                                                                                                                       	9
319	Aguadas                                                                                                                         	9
320	Anserma                                                                                                                         	9
321	Aranzazu                                                                                                                        	9
322	Belalcazar                                                                                                                      	9
323	Chinchina                                                                                                                       	9
324	Filadelfia                                                                                                                      	9
325	La Dorada                                                                                                                       	9
326	La Merced                                                                                                                       	9
327	Manzanares                                                                                                                      	9
328	Marmato                                                                                                                         	9
329	Marquetalia                                                                                                                     	9
330	Marulanda                                                                                                                       	9
331	Neira                                                                                                                           	9
332	Norcasia                                                                                                                        	9
333	Pacora                                                                                                                          	9
334	Palestina                                                                                                                       	9
335	Pensilvania                                                                                                                     	9
336	Riosucio                                                                                                                        	9
337	Risaralda                                                                                                                       	9
338	Salamina                                                                                                                        	9
339	Samana                                                                                                                          	9
340	San Jose                                                                                                                        	9
341	Supia                                                                                                                           	9
342	Victoria                                                                                                                        	9
343	Villamaria                                                                                                                      	9
344	Viterbo                                                                                                                         	9
345	Florencia                                                                                                                       	9
346	Albania                                                                                                                         	9
347	Belen Andaquies                                                                                                                 	9
348	Cartagena Del Chaira                                                                                                            	9
349	Curillo                                                                                                                         	9
350	El Doncello                                                                                                                     	9
351	El Paujil                                                                                                                       	9
352	La Montañita                                                                                                                    	9
353	Milan                                                                                                                           	9
354	Morelia                                                                                                                         	9
355	Puerto Rico                                                                                                                     	9
356	San Jose De Fragua                                                                                                              	9
357	San  Vicente Del Caguan                                                                                                         	9
358	Solano                                                                                                                          	9
359	Solita                                                                                                                          	9
360	Valparaiso                                                                                                                      	9
361	Popayan                                                                                                                         	12
362	Almaguer                                                                                                                        	12
363	Argelia                                                                                                                         	12
364	Balboa                                                                                                                          	12
365	Bolivar                                                                                                                         	12
366	Buenos Aires                                                                                                                    	12
367	Cajibio                                                                                                                         	12
368	Caldono                                                                                                                         	12
369	Caloto                                                                                                                          	12
370	Corinto                                                                                                                         	12
371	El Tambo                                                                                                                        	12
372	Florencia                                                                                                                       	12
373	Guapi                                                                                                                           	12
374	Inza                                                                                                                            	12
375	Jambalo                                                                                                                         	12
376	La Sierra                                                                                                                       	12
377	La Vega                                                                                                                         	12
378	Lopez                                                                                                                           	12
379	Mercaderes                                                                                                                      	12
380	Miranda                                                                                                                         	12
381	Morales                                                                                                                         	12
382	Padilla                                                                                                                         	12
383	Paez                                                                                                                            	12
384	Patia (EL Bordo)                                                                                                                	12
385	Piamonte                                                                                                                        	12
386	Piendamo                                                                                                                        	12
387	Puerto Tejada                                                                                                                   	12
388	Purace                                                                                                                          	12
389	Rosas                                                                                                                           	12
390	San Sebastian                                                                                                                   	12
391	Santander De Quilichao                                                                                                          	12
392	Santa Rosa                                                                                                                      	12
393	Silvia                                                                                                                          	12
394	Sotara                                                                                                                          	12
395	Suarez                                                                                                                          	12
396	Sucre                                                                                                                           	12
397	Timbio                                                                                                                          	12
398	Timbiqui                                                                                                                        	12
399	Toribio                                                                                                                         	12
400	Totoro                                                                                                                          	12
401	Villa Rica                                                                                                                      	12
402	Valledupar                                                                                                                      	13
403	Aguachica                                                                                                                       	13
404	Agustin Codazzi                                                                                                                 	13
405	Astrea                                                                                                                          	13
406	Becerril                                                                                                                        	13
407	Bosconia                                                                                                                        	13
408	Chimichagua                                                                                                                     	13
409	Chiriguana                                                                                                                      	13
410	Curumani                                                                                                                        	13
411	El Copey                                                                                                                        	13
412	El Paso                                                                                                                         	13
413	Gamarra                                                                                                                         	13
414	Gonzalez                                                                                                                        	13
415	La Gloria                                                                                                                       	13
416	La Jagua De Ibirico                                                                                                             	13
417	Manaure                                                                                                                         	13
418	Pailitas                                                                                                                        	13
419	Pelaya                                                                                                                          	13
420	Pueblo Bello                                                                                                                    	13
421	Rio De Oro                                                                                                                      	13
422	Robles (LA Paz)                                                                                                                 	13
423	San Alberto                                                                                                                     	13
424	San Diego                                                                                                                       	13
425	San Martin                                                                                                                      	13
426	Tamalameque                                                                                                                     	13
427	Monteria                                                                                                                        	14
428	Ayapel                                                                                                                          	14
429	Buenavista                                                                                                                      	14
430	Canalete                                                                                                                        	14
431	Cerete                                                                                                                          	14
432	Chima                                                                                                                           	14
433	Chinu                                                                                                                           	14
434	Cienaga De Oro                                                                                                                  	14
435	Cotorra                                                                                                                         	14
436	La Apartada                                                                                                                     	14
437	Lorica                                                                                                                          	14
438	Los Cordobas                                                                                                                    	14
439	Momil                                                                                                                           	14
440	Montelibano                                                                                                                     	14
441	Moñitos                                                                                                                         	14
442	Planeta Rica                                                                                                                    	14
443	Pueblo Nuevo                                                                                                                    	14
444	Puerto Escondido                                                                                                                	14
445	Puerto Libertador                                                                                                               	14
446	Purisima                                                                                                                        	14
447	Sahagun                                                                                                                         	14
448	San Andres Sotavento                                                                                                            	14
449	San Antero                                                                                                                      	14
450	San Bernardo Viento                                                                                                             	14
451	San Carlos                                                                                                                      	14
452	San Pelayo                                                                                                                      	14
453	Tierralta                                                                                                                       	14
454	Valencia                                                                                                                        	14
455	Agua De Dios                                                                                                                    	16
456	Alban                                                                                                                           	16
457	Anapoima                                                                                                                        	16
458	Anolaima                                                                                                                        	16
459	Arbelaez                                                                                                                        	16
460	Beltran                                                                                                                         	16
461	Bituima                                                                                                                         	16
462	Bojaca                                                                                                                          	16
463	Cabrera                                                                                                                         	16
464	Cachipay                                                                                                                        	16
465	Cajica                                                                                                                          	16
466	Caparrapi                                                                                                                       	16
467	Caqueza                                                                                                                         	16
468	Carmen De Carupa                                                                                                                	16
469	Chaguani                                                                                                                        	16
470	Chia                                                                                                                            	16
471	Chipaque                                                                                                                        	16
472	Choachi                                                                                                                         	16
473	Choconta                                                                                                                        	16
474	Cogua                                                                                                                           	16
475	Cota                                                                                                                            	16
476	Cucunuba                                                                                                                        	16
477	El Colegio                                                                                                                      	16
478	El Peñon                                                                                                                        	16
479	El Rosal                                                                                                                        	16
480	Facatativa                                                                                                                      	16
481	Fomeque                                                                                                                         	16
482	Fosca                                                                                                                           	16
483	Funza                                                                                                                           	16
484	Fuquene                                                                                                                         	16
485	Fusagasuga                                                                                                                      	16
486	Gachala                                                                                                                         	16
487	Gachancipa                                                                                                                      	16
488	Gacheta                                                                                                                         	16
489	Gama                                                                                                                            	16
490	Girardot                                                                                                                        	16
491	Granada                                                                                                                         	16
492	Guacheta                                                                                                                        	16
493	Guaduas                                                                                                                         	16
494	Guasca                                                                                                                          	16
495	Guataqui                                                                                                                        	16
496	Guatavita                                                                                                                       	16
497	Guayabal De Siquima                                                                                                             	16
498	Guayabetal                                                                                                                      	16
499	Gutierrez                                                                                                                       	16
500	Jerusalen                                                                                                                       	16
501	Junin                                                                                                                           	16
502	La Calera                                                                                                                       	16
503	La Mesa                                                                                                                         	16
504	La Palma                                                                                                                        	16
505	La Peña                                                                                                                         	16
506	La Vega                                                                                                                         	16
507	Lenguazaque                                                                                                                     	16
508	Macheta                                                                                                                         	16
509	Madrid                                                                                                                          	16
510	Manta                                                                                                                           	16
511	Medina                                                                                                                          	16
512	Mosquera                                                                                                                        	16
513	Nariño                                                                                                                          	16
514	Nemocon                                                                                                                         	16
515	Nilo                                                                                                                            	16
516	Nimaima                                                                                                                         	16
517	Nocaima                                                                                                                         	16
518	Venecia (OSPINA Perez)                                                                                                          	16
519	Pacho                                                                                                                           	16
520	Paime                                                                                                                           	16
521	Pandi                                                                                                                           	16
522	Paratebueno                                                                                                                     	16
523	Pasca                                                                                                                           	16
524	Puerto Salgar                                                                                                                   	16
525	Puli                                                                                                                            	16
526	Quebradanegra                                                                                                                   	16
527	Quetame                                                                                                                         	16
528	Quipile                                                                                                                         	16
529	Rafael Reyes                                                                                                                    	16
530	Ricaurte                                                                                                                        	16
531	San  Antonio Del  Tequendama                                                                                                    	16
532	San Bernardo                                                                                                                    	16
533	San Cayetano                                                                                                                    	16
534	San Francisco                                                                                                                   	16
535	San Juan De Rioseco                                                                                                             	16
536	Sasaima                                                                                                                         	16
537	Sesquile                                                                                                                        	16
538	Sibate                                                                                                                          	16
539	Silvania                                                                                                                        	16
540	Simijaca                                                                                                                        	16
541	Soacha                                                                                                                          	16
542	Sopo                                                                                                                            	16
543	Subachoque                                                                                                                      	16
544	Suesca                                                                                                                          	16
545	Supata                                                                                                                          	16
546	Susa                                                                                                                            	16
547	Sutatausa                                                                                                                       	16
548	Tabio                                                                                                                           	16
549	Tausa                                                                                                                           	16
550	Tena                                                                                                                            	16
551	Tenjo                                                                                                                           	16
552	Tibacuy                                                                                                                         	16
553	Tibirita                                                                                                                        	16
554	Tocaima                                                                                                                         	16
555	Tocancipa                                                                                                                       	16
556	Topaipi                                                                                                                         	16
557	Ubala                                                                                                                           	16
558	Ubaque                                                                                                                          	16
559	Ubate                                                                                                                           	16
560	Une                                                                                                                             	16
561	Utica                                                                                                                           	16
562	Vergara                                                                                                                         	16
563	Viani                                                                                                                           	16
564	Villagomez                                                                                                                      	16
565	Villapinzon                                                                                                                     	16
566	Villeta                                                                                                                         	16
567	Viota                                                                                                                           	16
568	Yacopi                                                                                                                          	16
569	Zipacon                                                                                                                         	16
570	Zipaquira                                                                                                                       	16
571	Quibdo                                                                                                                          	13
572	Acandi                                                                                                                          	13
573	Alto Baudo (PIE De Pato)                                                                                                        	13
574	Atrato                                                                                                                          	13
575	Bagado                                                                                                                          	13
576	Bahia Solano (MUTIS)                                                                                                            	13
577	Bajo Baudo (PIZARRO)                                                                                                            	13
578	Bojaya (BELLAVISTA)                                                                                                             	13
579	Canton De San Pablo                                                                                                             	13
580	Carmen Del Darien                                                                                                               	13
581	Certegui                                                                                                                        	13
582	Condoto                                                                                                                         	13
583	El Carmen                                                                                                                       	13
584	Litoral Del San Juan                                                                                                            	13
585	Istmina                                                                                                                         	13
586	Jurado                                                                                                                          	13
587	Lloro                                                                                                                           	13
588	Medio Atrato                                                                                                                    	13
589	Medio Baudo                                                                                                                     	13
590	Medio San Juan                                                                                                                  	13
591	Novita                                                                                                                          	13
592	Nuqui                                                                                                                           	13
593	Rio Iro                                                                                                                         	13
594	Rio Quito                                                                                                                       	13
595	Riosucio                                                                                                                        	13
596	San Jose Del Palmar                                                                                                             	13
597	Sipi                                                                                                                            	13
598	Tado                                                                                                                            	13
599	Unguia                                                                                                                          	13
600	Union Panamericana                                                                                                              	13
601	Neiva                                                                                                                           	19
602	Acevedo                                                                                                                         	19
603	Agrado                                                                                                                          	19
604	Aipe                                                                                                                            	19
605	Algeciras                                                                                                                       	19
606	Altamira                                                                                                                        	19
607	Baraya                                                                                                                          	19
608	Campoalegre                                                                                                                     	19
609	Colombia                                                                                                                        	19
610	Elias                                                                                                                           	19
611	Garzon                                                                                                                          	19
612	Gigante                                                                                                                         	19
613	Guadalupe                                                                                                                       	19
614	Hobo                                                                                                                            	19
615	Iquira                                                                                                                          	19
616	Isnos                                                                                                                           	19
617	La Argentina                                                                                                                    	19
618	La Plata                                                                                                                        	19
619	Nataga                                                                                                                          	19
620	Oporapa                                                                                                                         	19
621	Paicol                                                                                                                          	19
622	Palermo                                                                                                                         	19
623	Palestina                                                                                                                       	19
624	Pital                                                                                                                           	19
625	Pitalito                                                                                                                        	19
626	Rivera                                                                                                                          	19
627	Saladoblanco                                                                                                                    	19
628	San Agustin                                                                                                                     	19
629	Santa Maria                                                                                                                     	19
630	Suaza                                                                                                                           	19
631	Tarqui                                                                                                                          	19
632	Tesalia                                                                                                                         	19
633	Tello                                                                                                                           	19
634	Teruel                                                                                                                          	19
635	Timana                                                                                                                          	19
636	Villavieja                                                                                                                      	19
637	Yaguara                                                                                                                         	19
638	Riohacha                                                                                                                        	17
639	Albania                                                                                                                         	17
640	Barrancas                                                                                                                       	17
641	Dibulla                                                                                                                         	17
642	Distraccion                                                                                                                     	17
643	El Molino                                                                                                                       	17
644	Fonseca                                                                                                                         	17
645	Hatonuevo                                                                                                                       	17
646	La Jagua Del Pilar                                                                                                              	17
647	Maicao                                                                                                                          	17
648	Manaure                                                                                                                         	17
649	San Juan Del Cesar                                                                                                              	17
650	Uribia                                                                                                                          	17
651	Urumita                                                                                                                         	17
652	Villanueva                                                                                                                      	17
653	Santa Marta                                                                                                                     	28
654	Algarrobo                                                                                                                       	21
655	Aracataca                                                                                                                       	21
656	Ariguani                                                                                                                        	21
657	Cerro San Antonio                                                                                                               	21
658	Chivolo                                                                                                                         	21
659	Cienaga                                                                                                                         	21
660	Concordia                                                                                                                       	21
661	El Banco                                                                                                                        	21
662	El Piñon                                                                                                                        	21
663	El Reten                                                                                                                        	21
664	Fundacion                                                                                                                       	21
665	Guamal                                                                                                                          	21
666	Nueva Granada                                                                                                                   	21
667	Pedraza                                                                                                                         	21
668	Pijiño Del Carmen                                                                                                               	21
669	Pivijay                                                                                                                         	21
670	Plato                                                                                                                           	21
671	Puebloviejo                                                                                                                     	21
672	Remolino                                                                                                                        	21
673	Sabanas De San Angel                                                                                                            	21
674	Salamina                                                                                                                        	21
675	San Sebastian De Buenavista                                                                                                     	21
676	San Zenon                                                                                                                       	21
677	Santa Ana                                                                                                                       	21
678	Santa Barbara De Pinto                                                                                                          	21
679	Sitionuevo                                                                                                                      	21
680	Tenerife                                                                                                                        	21
681	Zapayan                                                                                                                         	21
682	Zona Bananera                                                                                                                   	21
683	Villavicencio                                                                                                                   	22
684	Acacias                                                                                                                         	22
685	Barranca De Upia                                                                                                                	22
686	Cabuyaro                                                                                                                        	22
687	Castilla La Nueva                                                                                                               	22
688	Cubarral                                                                                                                        	22
689	Cumaral                                                                                                                         	22
690	El Calvario                                                                                                                     	22
691	El Castillo                                                                                                                     	22
692	El Dorado                                                                                                                       	22
693	Fuente De Oro                                                                                                                   	22
694	Granada                                                                                                                         	22
695	Guamal                                                                                                                          	22
696	Mapiripan                                                                                                                       	22
697	Mesetas                                                                                                                         	22
698	La Macarena                                                                                                                     	22
699	La Uribe                                                                                                                        	22
700	Lejanias                                                                                                                        	22
701	Puerto Concordia                                                                                                                	22
702	Puerto Gaitan                                                                                                                   	22
703	Puerto Lopez                                                                                                                    	22
704	Puerto Lleras                                                                                                                   	22
705	Puerto Rico                                                                                                                     	22
706	Restrepo                                                                                                                        	22
707	San Carlos De Guaroa                                                                                                            	22
708	San Juan De Arama                                                                                                               	22
709	San Juanito                                                                                                                     	22
710	San Martin                                                                                                                      	22
711	Vista Hermosa                                                                                                                   	22
712	Pasto                                                                                                                           	23
713	Alban                                                                                                                           	23
714	Aldana                                                                                                                          	23
715	Ancuya                                                                                                                          	23
716	Arboleda                                                                                                                        	23
717	Barbacoas                                                                                                                       	23
718	Belen                                                                                                                           	23
719	Buesaco                                                                                                                         	23
720	Colon-Genova                                                                                                                    	23
721	Consaca                                                                                                                         	23
722	Contadero                                                                                                                       	23
723	Cordoba                                                                                                                         	23
724	Cuaspud-Carlosama                                                                                                               	23
725	Cumbal                                                                                                                          	23
726	Cumbitara                                                                                                                       	23
727	Chachagui                                                                                                                       	23
728	El Charco                                                                                                                       	23
729	El Peñol                                                                                                                        	23
730	El Rosario                                                                                                                      	23
731	El Tablon                                                                                                                       	23
732	El Tambo                                                                                                                        	23
733	Funes                                                                                                                           	23
734	Guachucal                                                                                                                       	23
735	Guaitarilla                                                                                                                     	23
736	Gualmatan                                                                                                                       	23
737	Iles                                                                                                                            	23
738	Imues                                                                                                                           	23
739	Ipiales                                                                                                                         	23
740	La Cruz                                                                                                                         	23
741	La Florida                                                                                                                      	23
742	La Llanada                                                                                                                      	23
743	La Tola                                                                                                                         	23
744	La Union                                                                                                                        	23
745	Leiva                                                                                                                           	23
746	Linares                                                                                                                         	23
747	Los Andes                                                                                                                       	23
748	Magui-Payan                                                                                                                     	23
749	Mallama                                                                                                                         	23
750	Mosquera                                                                                                                        	23
751	Nariño                                                                                                                          	23
752	Olaya Herrera                                                                                                                   	23
753	Ospina                                                                                                                          	23
754	Francisco Pizarro                                                                                                               	23
755	Policarpa                                                                                                                       	23
756	Potosi                                                                                                                          	23
757	Providencia                                                                                                                     	23
758	Puerres                                                                                                                         	23
759	Pupiales                                                                                                                        	23
760	Ricaurte                                                                                                                        	23
761	Roberto Payan                                                                                                                   	23
762	Samaniego                                                                                                                       	23
763	Sandona                                                                                                                         	23
764	San Bernardo                                                                                                                    	23
765	San Lorenzo                                                                                                                     	23
766	San Pablo                                                                                                                       	23
767	San Pedro De Cartago                                                                                                            	23
768	Santa Barbara                                                                                                                   	23
769	Santacruz                                                                                                                       	23
770	Sapuyes                                                                                                                         	23
771	Taminango                                                                                                                       	23
772	Tangua                                                                                                                          	23
773	Tumaco                                                                                                                          	23
774	Tuquerres                                                                                                                       	23
775	Yacuanquer                                                                                                                      	23
776	Cucuta                                                                                                                          	24
777	Abrego                                                                                                                          	24
778	Arboledas                                                                                                                       	24
779	Bochalema                                                                                                                       	24
780	Bucarasica                                                                                                                      	24
781	Cacota                                                                                                                          	24
782	Cachira                                                                                                                         	24
783	Chinacota                                                                                                                       	24
784	Chitaga                                                                                                                         	24
785	Convencion                                                                                                                      	24
786	Cucutilla                                                                                                                       	24
787	Durania                                                                                                                         	24
788	El Carmen                                                                                                                       	24
789	El Tarra                                                                                                                        	24
790	El Zulia                                                                                                                        	24
791	Gramalote                                                                                                                       	24
792	Hacari                                                                                                                          	24
793	Herran                                                                                                                          	24
794	Labateca                                                                                                                        	24
795	La Esperanza                                                                                                                    	24
796	La Playa                                                                                                                        	24
797	Los Patios                                                                                                                      	24
798	Lourdes                                                                                                                         	24
799	Mutiscua                                                                                                                        	24
800	Ocaña                                                                                                                           	24
801	Pamplona                                                                                                                        	24
802	Pamplonita                                                                                                                      	24
803	Puerto Santander                                                                                                                	24
804	Ragonvalia                                                                                                                      	24
805	Salazar                                                                                                                         	24
806	San Calixto                                                                                                                     	24
807	San Cayetano                                                                                                                    	24
808	Santiago                                                                                                                        	24
809	Sardinata                                                                                                                       	24
810	Silos                                                                                                                           	24
811	Teorama                                                                                                                         	24
812	Tibu                                                                                                                            	24
813	Toledo                                                                                                                          	24
814	Villacaro                                                                                                                       	24
815	Villa Del Rosario                                                                                                               	24
816	Armenia                                                                                                                         	25
817	Buenavista                                                                                                                      	25
818	Calarca                                                                                                                         	25
819	Circasia                                                                                                                        	25
820	Cordoba                                                                                                                         	25
821	Filandia                                                                                                                        	25
822	Genova                                                                                                                          	25
823	La Tebaida                                                                                                                      	25
824	Montenegro                                                                                                                      	25
825	Pijao                                                                                                                           	25
826	Quimbaya                                                                                                                        	25
827	Salento                                                                                                                         	25
828	Pereira                                                                                                                         	27
829	Apia                                                                                                                            	27
830	Balboa                                                                                                                          	27
831	Belen De Umbria                                                                                                                 	27
832	Dosquebradas                                                                                                                    	27
833	Guatica                                                                                                                         	27
834	La Celia                                                                                                                        	27
835	La Virginia                                                                                                                     	27
836	Marsella                                                                                                                        	27
837	Mistrato                                                                                                                        	27
838	Pueblo Rico                                                                                                                     	27
839	Quinchia                                                                                                                        	27
840	Santa Rosa De Cabal                                                                                                             	27
841	Santuario                                                                                                                       	27
842	Bucaramanga                                                                                                                     	29
843	Aguada                                                                                                                          	29
844	Albania                                                                                                                         	29
845	Aratoca                                                                                                                         	29
846	Barbosa                                                                                                                         	29
847	Barichara                                                                                                                       	29
848	Barrancabermeja                                                                                                                 	29
849	Betulia                                                                                                                         	29
850	Bolivar                                                                                                                         	29
851	Cabrera                                                                                                                         	29
852	California                                                                                                                      	29
853	Capitanejo                                                                                                                      	29
854	Carcasi                                                                                                                         	29
855	Cepita                                                                                                                          	29
856	Cerrito                                                                                                                         	29
857	Charala                                                                                                                         	29
858	Charta                                                                                                                          	29
859	Chima                                                                                                                           	29
860	Chipata                                                                                                                         	29
861	Cimitarra                                                                                                                       	29
862	Concepcion                                                                                                                      	29
863	Confines                                                                                                                        	29
864	Contratacion                                                                                                                    	29
865	Coromoro                                                                                                                        	29
866	Curiti                                                                                                                          	29
867	El Carmen                                                                                                                       	29
868	El Guacamayo                                                                                                                    	29
869	El Peñon                                                                                                                        	29
870	El Playon                                                                                                                       	29
871	Encino                                                                                                                          	29
872	Enciso                                                                                                                          	29
873	Florian                                                                                                                         	29
874	Floridablanca                                                                                                                   	29
875	Galan                                                                                                                           	29
876	Gambita                                                                                                                         	29
877	Giron                                                                                                                           	29
878	Guaca                                                                                                                           	29
879	Guadalupe                                                                                                                       	29
880	Guapota                                                                                                                         	29
881	Guavata                                                                                                                         	29
882	Guepsa                                                                                                                          	29
883	Hato                                                                                                                            	29
884	Jesus Maria                                                                                                                     	29
885	Jordan                                                                                                                          	29
886	La Belleza                                                                                                                      	29
887	Landazuri                                                                                                                       	29
888	La Paz                                                                                                                          	29
889	Lebrija                                                                                                                         	29
890	Los Santos                                                                                                                      	29
891	Macaravita                                                                                                                      	29
892	Malaga                                                                                                                          	29
893	Matanza                                                                                                                         	29
894	Mogotes                                                                                                                         	29
895	Molagavita                                                                                                                      	29
896	Ocamonte                                                                                                                        	29
897	Oiba                                                                                                                            	29
898	Onzaga                                                                                                                          	29
899	Palmar                                                                                                                          	29
900	Palmas Del Socorro                                                                                                              	29
901	Paramo                                                                                                                          	29
902	Piedecuesta                                                                                                                     	29
903	Pinchote                                                                                                                        	29
904	Puente Nacional                                                                                                                 	29
905	Puerto Parra                                                                                                                    	29
906	Puerto Wilches                                                                                                                  	29
907	Rionegro                                                                                                                        	29
908	Sabana De Torres                                                                                                                	29
909	San Andres                                                                                                                      	29
910	San Benito                                                                                                                      	29
911	San Gil                                                                                                                         	29
912	San Joaquin                                                                                                                     	29
913	San Jose De Miranda                                                                                                             	29
914	San Miguel                                                                                                                      	29
915	San Vicente De Chucuri                                                                                                          	29
916	Santa Barbara                                                                                                                   	29
917	Santa Helena                                                                                                                    	29
918	Simacota                                                                                                                        	29
919	Socorro                                                                                                                         	29
920	Suaita                                                                                                                          	29
921	Sucre                                                                                                                           	29
922	Surata                                                                                                                          	29
923	Tona                                                                                                                            	29
924	Valle San Jose                                                                                                                  	29
925	Velez                                                                                                                           	29
926	Vetas                                                                                                                           	29
927	Villanueva                                                                                                                      	29
928	Zapatoca                                                                                                                        	29
929	Sincelejo                                                                                                                       	30
930	Buenavista                                                                                                                      	30
931	Caimito                                                                                                                         	30
932	Coloso                                                                                                                          	30
933	Corozal                                                                                                                         	30
934	Coveñas                                                                                                                         	30
935	Chalan                                                                                                                          	30
936	El Roble                                                                                                                        	30
937	Galeras                                                                                                                         	30
938	Guaranda                                                                                                                        	30
939	La Union                                                                                                                        	30
940	Los Palmitos                                                                                                                    	30
941	Majagual                                                                                                                        	30
942	Morroa                                                                                                                          	30
943	Ovejas                                                                                                                          	30
944	Palmito                                                                                                                         	30
945	Sampues                                                                                                                         	30
946	San Benito Abad                                                                                                                 	30
947	San Juan De Betulia                                                                                                             	30
948	San Marcos                                                                                                                      	30
949	San Onofre                                                                                                                      	30
950	San Pedro                                                                                                                       	30
951	Since                                                                                                                           	30
952	Sucre                                                                                                                           	30
953	Tolu                                                                                                                            	30
954	Toluviejo                                                                                                                       	30
955	Ibague                                                                                                                          	31
956	Alpujarra                                                                                                                       	31
957	Alvarado                                                                                                                        	31
958	Ambalema                                                                                                                        	31
959	Anzoategui                                                                                                                      	31
960	Armero (GUAYABAL)                                                                                                               	31
961	Ataco                                                                                                                           	31
962	Cajamarca                                                                                                                       	31
963	Carmen De Apicala                                                                                                               	31
964	Casabianca                                                                                                                      	31
965	Chaparral                                                                                                                       	31
966	Coello                                                                                                                          	31
967	Coyaima                                                                                                                         	31
968	Cunday                                                                                                                          	31
969	Dolores                                                                                                                         	31
970	Espinal                                                                                                                         	31
971	Falan                                                                                                                           	31
972	Flandes                                                                                                                         	31
973	Fresno                                                                                                                          	31
974	Guamo                                                                                                                           	31
975	Herveo                                                                                                                          	31
976	Honda                                                                                                                           	31
977	Icononzo                                                                                                                        	31
978	Lerida                                                                                                                          	31
979	Libano                                                                                                                          	31
980	Mariquita                                                                                                                       	31
981	Melgar                                                                                                                          	31
982	Murillo                                                                                                                         	31
983	Natagaima                                                                                                                       	31
984	Ortega                                                                                                                          	31
985	Palocabildo                                                                                                                     	31
986	Piedras                                                                                                                         	31
987	Planadas                                                                                                                        	31
988	Prado                                                                                                                           	31
989	Purificacion                                                                                                                    	31
990	Rioblanco                                                                                                                       	31
991	Roncesvalles                                                                                                                    	31
992	Rovira                                                                                                                          	31
993	Saldaña                                                                                                                         	31
994	San Antonio                                                                                                                     	31
995	San Luis                                                                                                                        	31
996	Santa Isabel                                                                                                                    	31
997	Suarez                                                                                                                          	31
998	Valle De S Juan                                                                                                                 	31
999	Venadillo                                                                                                                       	31
1000	Villahermosa                                                                                                                    	31
1001	Villarrica                                                                                                                      	31
1002	Cali                                                                                                                            	32
1003	Alcala                                                                                                                          	32
1004	Andalucia                                                                                                                       	32
1005	Ansermanuevo                                                                                                                    	32
1006	Argelia                                                                                                                         	32
1007	Bolivar                                                                                                                         	32
1008	Buenaventura                                                                                                                    	32
1009	Buga                                                                                                                            	32
1010	Bugalagrande                                                                                                                    	32
1011	Caicedonia                                                                                                                      	32
1012	Calima-Darien                                                                                                                   	32
1013	Candelaria                                                                                                                      	32
1014	Cartago                                                                                                                         	32
1015	Dagua                                                                                                                           	32
1016	El Aguila                                                                                                                       	32
1017	El Cairo                                                                                                                        	32
1018	El Cerrito                                                                                                                      	32
1019	El Dovio                                                                                                                        	32
1020	Florida                                                                                                                         	32
1021	Ginebra                                                                                                                         	32
1022	Guacari                                                                                                                         	32
1023	Jamundi                                                                                                                         	32
1024	La Cumbre                                                                                                                       	32
1025	La Union                                                                                                                        	32
1026	La Victoria                                                                                                                     	32
1027	Obando                                                                                                                          	32
1028	Palmira                                                                                                                         	32
1029	Pradera                                                                                                                         	32
1030	Restrepo                                                                                                                        	32
1031	Riofrio                                                                                                                         	32
1032	Roldanillo                                                                                                                      	32
1033	San Pedro                                                                                                                       	32
1034	Sevilla                                                                                                                         	32
1035	Toro                                                                                                                            	32
1036	Trujillo                                                                                                                        	32
1037	Tulua                                                                                                                           	32
1038	Ulloa                                                                                                                           	32
1039	Versalles                                                                                                                       	32
1040	Vijes                                                                                                                           	32
1041	Yotoco                                                                                                                          	32
1042	Yumbo                                                                                                                           	32
1043	Zarzal                                                                                                                          	32
1044	Arauca                                                                                                                          	4
1045	Arauquita                                                                                                                       	4
1046	Cravo Norte                                                                                                                     	4
1047	Fortul                                                                                                                          	4
1048	Puerto Rondon                                                                                                                   	4
1049	Saravena                                                                                                                        	4
1050	Tame                                                                                                                            	4
1051	Yopal                                                                                                                           	11
1052	Aguazul                                                                                                                         	11
1053	Chameza                                                                                                                         	11
1054	Hato Corozal                                                                                                                    	11
1055	La Salina                                                                                                                       	11
1056	Mani                                                                                                                            	11
1057	Monterrey                                                                                                                       	11
1058	Nunchia                                                                                                                         	11
1059	Orocue                                                                                                                          	11
1060	Paz De Ariporo                                                                                                                  	11
1061	Pore                                                                                                                            	11
1062	Recetor                                                                                                                         	11
1063	Sabanalarga                                                                                                                     	11
1064	Sacama                                                                                                                          	11
1065	San Luis De Palenque                                                                                                            	11
1066	Tamara                                                                                                                          	11
1067	Tauramena                                                                                                                       	11
1068	Trinidad                                                                                                                        	11
1069	Villanueva                                                                                                                      	11
1070	Mocoa                                                                                                                           	25
1071	Colon                                                                                                                           	25
1072	Orito                                                                                                                           	25
1073	Puerto Asis                                                                                                                     	25
1074	Puerto Caycedo                                                                                                                  	25
1075	Puerto Guzman                                                                                                                   	25
1076	Puerto Leguizamo                                                                                                                	25
1077	Sibundoy                                                                                                                        	25
1078	San Francisco                                                                                                                   	25
1079	San Miguel                                                                                                                      	25
1080	Santiago                                                                                                                        	25
1081	Valle Del Guamuez                                                                                                               	25
1082	Villagarzon                                                                                                                     	25
1083	San Andres                                                                                                                      	27
1084	Providencia                                                                                                                     	27
1085	Leticia                                                                                                                         	2
1086	Puerto Nariño                                                                                                                   	2
1087	Puerto Inirida                                                                                                                  	16
1088	San Jose Del Guaviare                                                                                                           	18
1089	Calamar                                                                                                                         	18
1090	El Retorno                                                                                                                      	18
1091	Miraflores                                                                                                                      	18
1092	Mitu                                                                                                                            	32
1093	Caruru                                                                                                                          	32
1094	Taraira                                                                                                                         	32
1095	Puerto Carreño                                                                                                                  	34
1096	La Primavera                                                                                                                    	34
1097	Santa Rosalia                                                                                                                   	34
1098	Cumaribo                                                                                                                        	34
1099	Nacional                                                                                                                        	34
1100	Regional                                                                                                                        	35
1101	Departamental                                                                                                                   	35
\.


--
-- Data for Name: departaments; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY departaments ("ID_departament", departament_name, "ID_Territorial_Division") FROM stdin;
1	Amazonas                                                                                                                        	6
2	Antioquia                                                                                                                       	2
3	Arauca                                                                                                                          	3
4	Atlántico                                                                                                                       	1
5	Bogotá                                                                                                                          	6
6	Bolívar                                                                                                                         	1
7	Boyacá                                                                                                                          	6
8	Caldas                                                                                                                          	2
9	Caquetá                                                                                                                         	6
10	Casanare                                                                                                                        	6
11	Cauca                                                                                                                           	5
12	Cesar                                                                                                                           	1
13	Chocó                                                                                                                           	2
14	Córdoba                                                                                                                         	1
15	Cundinamarca                                                                                                                    	6
16	Guainía                                                                                                                         	6
17	Guaviare                                                                                                                        	6
18	Huila                                                                                                                           	6
19	La guajira                                                                                                                      	1
20	Magdalena                                                                                                                       	1
21	Meta                                                                                                                            	6
22	Nariño                                                                                                                          	5
23	Norte de Santander                                                                                                              	3
24	Putumayo                                                                                                                        	6
25	Quindío                                                                                                                         	5
26	Risaralda                                                                                                                       	2
27	San Andrés                                                                                                                      	6
28	Santander                                                                                                                       	4
29	Sucre                                                                                                                           	1
30	Tolima                                                                                                                          	6
31	Valle del Cauca                                                                                                                 	5
32	Vaupés                                                                                                                          	6
33	Vichada                                                                                                                         	6
34	Nacional                                                                                                                        	7
35	Regional                                                                                                                        	7
\.


--
-- Data for Name: frequency_bands; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY frequency_bands ("ID_frequency_bands", frequency_bands_name, frequency_bands_range, frequency_bands_wavelength) FROM stdin;
1	Very Low Frecuency VLF                                                                                                          	3 - 30 kHz                                                                                                                      	100 - 10 Km.                                                                                                                    
2	Low Frecuency LF                                                                                                                	30 - 300 kHz                                                                                                                    	10 - 1 Km.                                                                                                                      
3	Médium Frecuency MF                                                                                                             	300 - 3000 kHz                                                                                                                  	1 - 0.1 Km.                                                                                                                     
4	High Frecuency HF                                                                                                               	3 - 30 MHz                                                                                                                      	0.1 - 0.01 Km.                                                                                                                  
5	Very High Frecuency VHF                                                                                                         	30 - 300 MHz                                                                                                                    	0.01 - 0.001 Km.                                                                                                                
6	Ultra High Frecuency UHF                                                                                                        	300 - 3000 MHz                                                                                                                  	0.001 - 0.0001 Km.                                                                                                              
7	Super High Frecuency SHF                                                                                                        	3 - 30 GHz                                                                                                                      	0.0001 - 0.00001 Km.                                                                                                            
8	Extremely High Frecuency EHF                                                                                                    	30 - 300 GHz                                                                                                                    	0.00001 - 0.000001 Km.                                                                                                          
\.


--
-- Data for Name: frequency_ranks; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY frequency_ranks ("ID_frequency_ranks", frequency_ranks_name, "ID_frequency_bands", frequency_ranks_description, max_channels_per_operator, "frequency_begin_Hz", "frequency_end_Hz", channels_number) FROM stdin;
1	4 000-4 063 kHz                                                                                                                 	4	Transmisión (kHz) en banda lateral única recomendadas para estaciones de barco en la banda 4 000-4 063 kHz compartida con el servicio fijo                                                                                                                                                                                                                                                                                                                                                                                      	10	4000000	4063000	21
2	4357-4355 kHz                                                                                                                   	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 4 MHz                                                                                                                                                                                                                                                                                                                                                                                                                          	10	4065000	4355000	29
3	6501-6522 kHz                                                                                                                   	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 6 MHz                                                                                                                                                                                                                                                                                                                                                                                                                          	5	6501000	6523400	8
4	8 100-8 195 kHz                                                                                                                 	4	Transmisión en banda lateral única recomendadas para estaciones de barco y costeras en la banda 8 100-8 195 kHz compartida con el servicio fijo                                                                                                                                                                                                                                                                                                                                                                                 	10	8101000	8192000	31
5	8196-8813 kHz                                                                                                                   	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 8 MHz                                                                                                                                                                                                                                                                                                                                                                                                                          	10	8193000	8813000	37
6	12230-13197 kHz                                                                                                                 	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 12 MHz                                                                                                                                                                                                                                                                                                                                                                                                                         	10	12230000	13197000	41
7	16360-17408 kHz                                                                                                                 	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 16 MHz                                                                                                                                                                                                                                                                                                                                                                                                                         	10	16360000	17360000	56
8	18823-19798 kHz                                                                                                                 	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 18/19 MHz                                                                                                                                                                                                                                                                                                                                                                                                                      	10	18823000	19798000	15
9	22000-22853 kHz                                                                                                                 	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 22 MHz                                                                                                                                                                                                                                                                                                                                                                                                                         	10	22000000	22853000	53
10	25070-26173 kHz                                                                                                                 	4	Transmisión para explotación dúplex en banda lateral única (canales de dos frecuencias) Banda de 25/26 MHz                                                                                                                                                                                                                                                                                                                                                                                                                      	5	22570000	26173000	10
11	26.960 - 27.410 MHz                                                                                                             	4	RADIOCOMUNICACIÓN DE BANDA CIUDADANA Reservados Canales 7.8.9 y 10 atención de desastres                                                                                                                                                                                                                                                                                                                                                                                                                                        	10	2696000	2741000	40
12	54-700 MHz                                                                                                                      	5	SERVICIO DE RADIODIFUSIÓN TELEVISIÓN                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	54000000	70000000	50
13	156-162 MHz                                                                                                                     	5	SERVICIO MÓVIL MARÍTIMO                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         	10	156000000	162000000	88
14	227.5-246.9 MHz                                                                                                                 	5	BANDA DE 200 MHz SERVICIO DE RADIODIFUSIÓN SONORA                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	10	227500000	246900000	60
15	254-260 MHz                                                                                                                     	5	SERVICIOS FIJO Y MOVIL CONVENCIONAL (ACCESO TRONCALIZADO) BANDA DE 200 MHz                                                                                                                                                                                                                                                                                                                                                                                                                                                      	10	254000000	260000000	480
16	300-328.5 MHz                                                                                                                   	6	BANDA DE 300 MHz SERVICIO DE RADIODIFUSIÓN SONORA                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	10	300000000	328500000	143
17	406.1-413.05 MHz y 423.05-430 MHz BANDA 1                                                                                       	6	 SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          	10	406100000	430000000	133
18	406.1-413.05 MHz y 423.05-430 MHz BANDA 2                                                                                       	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	406100000	430000000	66
19	406.1-413.05 MHz y 423.05-430 MHz BANDA 3                                                                                       	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	406100000	430000000	44
20	406.1-413.05 MHz y 423.05-430 MHz BANDA 4                                                                                       	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	406100000	430000000	33
21	406.1-413.05 MHz y 423.05-430 MHz BANDA 5                                                                                       	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	406100000	430000000	26
22	406.1-413.05 MHz y 423.05-430 MHz BANDA 6                                                                                       	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	406100000	430000000	11
23	413.05-423.05 MHz y 440-450 MHz BANDA 1                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	413500000	450000000	39
24	413.05-423.05 MHz y 440-450 MHz BANDA 2                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	413500000	450000000	32
25	413.05-423.05 MHz y 440-450 MHz BANDA 3                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	413500000	450000000	19
26	413.05-423.05 MHz y 440-450 MHz BANDA 4                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	10	413500000	450000000	16
27	413.05-423.05 MHz y 440-450 MHz BANDA 5                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	6	413500000	450000000	12
28	413.05-423.05 MHz y 440-450 MHz BANDA 6                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	3	413500000	450000000	9
29	413.05-423.05 MHz y 440-450 MHz BANDA 7                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	2	413500000	450000000	5
30	413.05-423.05 MHz y 440-450 MHz BANDA 8                                                                                         	6	SISTEMAS INALÁMBRICOS FIJOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	2	413500000	450000000	2
31	412 – 415 MHz y 422 – 425 MHz                                                                                                   	6	SERVICIOS FIJO Y MOVIL CONVENCIONAL                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	412000000	425000000	240
32	415 – 420 MHz y 425 – 430 MHz                                                                                                   	6	SERVICIOS FIJO Y MOVIL CONVENCIONAL                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	415000000	430000000	200
33	806 - 821 MHz y 851 – 866 MHz                                                                                                   	6	SERVICIO MÓVIL (ACCESO TRONCALIZADO)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	806000000	860000000	600
34	821 - 824 MHz y 866 – 869 MHz                                                                                                   	6	SERVICIO MÓVIL (ACCESO TRONCALIZADO)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	821000000	869000000	240
35	896 - 897 MHz y 935 – 936.125 MHz                                                                                               	6	SERVICIO MÓVIL (ACCESO TRONCALIZADO)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	896000000	936125000	90
36	BANDA DE 800 MHz                                                                                                                	6	SERVICIO MÓVIL(TELEFONÍA MÓVIL CELULAR)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         	80	825000000	895000000	1023
37	BANDA DE 1.5 GHz 1 427 – 1 530 MHz BANDA 1                                                                                      	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES DE PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	1427000000	1530000000	93
38	BANDA DE 1.5 GHz 1 427 – 1 530 MHz BANDA 2                                                                                      	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	10	1427000000	1530000000	75
39	BANDA DE 1.5 GHz 1 427 – 1 530 MHz BANDA 3                                                                                      	6	SISTEMAS DE RELEVADORES ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	10	1427000000	1530000000	96
40	BANDA DE 1.5 GHz 1 427 – 1 530 MHz BANDA 4                                                                                      	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES DE PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	1427000000	1530000000	21
41	Banda 1700 – 1900 MHZ                                                                                                           	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE BAJA Y MEDIA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	2	1700000000	1900000000	6
42	Banda 1900 – 2100 MHz                                                                                                           	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE BAJA Y MEDIA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	2	1900000000	2100000000	6
43	Banda 2100 – 2300 MHz                                                                                                           	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE BAJA Y MEDIA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	2	2100000000	2300000000	6
44	Banda 2500 – 2700 MHz                                                                                                           	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE BAJA Y MEDIA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	2	2500000000	2700000000	6
45	1724-2082 MHz                                                                                                                   	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                    	2	1724000000	2082000000	6
46	1922-2280 MHz                                                                                                                   	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                    	2	1922000000	2280000000	6
47	1753-2111 MHz                                                                                                                   	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                    	2	1753000000	2111000000	6
48	1907.5-2265.5 MHz                                                                                                               	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                    	2	1907500000	2265500000	6
49	2308-2481 MHz                                                                                                                   	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE BAJA Y MEDIA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	10	2308000000	2481000000	6
50	2025-2100 MHz                                                                                                                   	6	SERVICIO DE RADIODIFUSIÓN TELEVISIÓN                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	3	2025000000	2100000000	15
51	2304-2386 MHz                                                                                                                   	6	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE PEQUEÑA Y MEDIANA CAPACIDAD O DIGITALES DE MEDIANA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                              	2	2304000000	2386000000	12
52	BANDA DE 3.5 GHz                                                                                                                	7	ACCESO DE BANDA ANCHA INALÁMBRICA                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	1	3400000000	3592000000	6
53	BANDA DE 4 GHz BANDA 1                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                        	1	3700000000	4200000000	6
54	BANDA DE 4 GHz BANDA 2                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	3700000000	4200000000	7
55	BANDA DE 5 GHz BANDA 1                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE ALTA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	4400000000	5000000000	7
56	BANDA DE 5 GHz BANDA 2                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE ALTA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	4400000000	5000000000	4
57	BANDA DE 5 GHz BANDA 3                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE ALTA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	4400000000	5000000000	3
58	BANDA DE 5 GHz BANDA 4                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE ALTA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	4400000000	5000000000	4
59	BANDA DE 5 GHz BANDA 5                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE ALTA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	1	4400000000	5000000000	8
60	BANDA DE 6 GHz BANDA 1                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O DIGITALES DE GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                	1	5925000000	7110000000	8
61	BANDA DE 6 GHz BANDA 2                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD O DIGITALES DE GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                      	2	5925000000	7110000000	16
62	BANDA DE 7 GHz BANDA 1                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                         	3	7125000000	7725000000	20
63	BANDA DE 7 GHz BANDA 2                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE PEQUEÑA Y MEDIANA CAPACIDAD O DIGITALES DE MEDIANA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                              	2	7125000000	7725000000	14
64	BANDA DE 7 GHz BANDA 3                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE PEQUEÑA Y MEDIANA CAPACIDAD O DIGITALES DE MEDIANA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                              	1	7125000000	7725000000	5
65	BANDA DE 8 GHz BANDA 1                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O SU EQUIVALENTE EN DIGITAL                                                                                                                                                                                                                                                                                                                                                                                                                                                  	2	7725000000	8500000000	12
66	BANDA DE 8 GHz BANDA 2                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE MEDIA Y GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                    	2	7725000000	8500000000	8
67	BANDA DE 8 GHz BANDA 3                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE MEDIA Y PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                  	2	7725000000	8500000000	6
68	BANDA DE 8 GHz BANDA 4                                                                                                          	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE MEDIA Y PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                  	2	7725000000	8500000000	12
69	BANDA DE 10 GHz BANDA 1                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	2	10500000000	10680000000	12
70	BANDA DE 10 GHz BANDA 2                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS O SU EQUIVALENTE EN DIGITAL                                                                                                                                                                                                                                                                                                                                                                                                                                                  	3	10500000000	10680000000	12
71	BANDA DE 10 GHz BANDA 3                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE MEDIA Y BAJA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                     	3	10500000000	10680000000	12
72	BANDA DE 10 GHz BANDA 4                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE GRAN CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                             	3	10500000000	10680000000	12
73	BANDA DE 10 GHz BANDA 5                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE CAPACIDAD PEQUEÑA Y MEDIA O DIGITALES DE CAPACIDAD MEDIA Y GRANDE                                                                                                                                                                                                                                                                                                                                                                                                         	3	10500000000	10680000000	8
74	BANDA DE 13 GHz BANDA 1                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE CAPACIDAD PEQUEÑA Y MEDIA O DIGITALES DE CAPACIDAD MEDIA Y GRANDE                                                                                                                                                                                                                                                                                                                                                                                                         	10	12750000000	13250000000	64
75	BANDA DE 13 GHz BANDA 2                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS DE CAPACIDAD PEQUEÑA Y MEDIA O DIGITALES DE CAPACIDAD MEDIA Y GRANDE                                                                                                                                                                                                                                                                                                                                                                                                         	2	12750000000	13250000000	6
76	BANDA DE 15 GHz                                                                                                                 	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE MEDIANA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                          	8	14400000000	15350000000	60
77	BANDA DE 18 GHz BANDA 1                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	6	17700000000	19000000000	35
78	BANDA DE 18 GHz BANDA 2                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	1	17700000000	19000000000	7
79	BANDA DE 18 GHz BANDA 3                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                               	3	17700000000	19000000000	15
80	BANDA DE 18 GHz BANDA 4                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS DIGITALES DE MEDIANA Y PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                                	10	17700000000	19000000000	245
81	BANDA DE 23 GHz BANDA 1                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES DE PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	21200000000	23600000000	342
82	BANDA DE 23 GHz BANDA 2                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES DE PEQUEÑA CAPACIDAD                                                                                                                                                                                                                                                                                                                                                                                                                                             	10	21200000000	23600000000	288
83	BANDA DE 26 GHz BANDA 1                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	2	25250000000	27500000000	8
84	BANDA DE 26 GHz BANDA 2                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	4	25250000000	27500000000	16
85	BANDA DE 26 GHz BANDA 3                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	8	25250000000	27500000000	32
86	BANDA DE 26 GHz BANDA 4                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	8	25250000000	27500000000	64
87	BANDA DE 26 GHz BANDA 5                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	8	25250000000	27500000000	64
88	BANDA DE 26 GHz BANDA 6                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	10	25250000000	27500000000	128
89	BANDA DE 26 GHz BANDA 7                                                                                                         	7	SISTEMAS DE RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	15	25250000000	27500000000	256
90	BANDA DE 28 GHz                                                                                                                 	7	SERVICIO FIJO                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	1	27500000000	29500000000	6
91	BANDA DE 38 GHz BANDA 1                                                                                                         	8	SERVICIO FIJO  RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES DE CORTO ALCANCE                                                                                                                                                                                                                                                                                                                                                                                                                                              	8	37058000000	38600000000	80
92	BANDA DE 38 GHz BANDA 2                                                                                                         	8	SERVICIO FIJO  RELEVADORES RADIOELÉCTRICOS ANALÓGICOS Y DIGITALES                                                                                                                                                                                                                                                                                                                                                                                                                                                               	2	37058000000	38600000000	13
93	BANDA (51.4-52.6 GHz) BANDA 1                                                                                                   	8	RECOMENDACIÓN UIT-R F. 1496-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	1	51400000000	52600000000	9
94	BANDA (51.4-52.6 GHz) BANDA 2                                                                                                   	8	RECOMENDACIÓN UIT-R F. 1496-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	3	51400000000	52600000000	18
95	BANDA (51.4-52.6 GHz) BANDA 3                                                                                                   	8	RECOMENDACIÓN UIT-R F. 1496-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	8	51400000000	52600000000	36
96	BANDA (51.4-52.6 GHz) BANDA 4                                                                                                   	8	RECOMENDACIÓN UIT-R F. 1496-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	8	51400000000	52600000000	72
97	BANDA (51.4-52.6 GHz) BANDA 5                                                                                                   	8	RECOMENDACIÓN UIT-R F. 1496-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	8	51400000000	52600000000	144
98	BANDA (55.78-57 GHz) BANDA 1                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	2	55780000000	57000000000	20
99	BANDA (55.78-57 GHz) BANDA 2                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	2	55780000000	57000000000	40
100	BANDA (55.78-57 GHz) BANDA 3                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	55780000000	57000000000	80
101	BANDA (55.78-57 GHz) BANDA 4                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	55780000000	57000000000	160
102	BANDA (55.78-57 GHz) BANDA 5                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	15	55780000000	57000000000	320
103	BANDA (55.78-57 GHz) BANDA 6                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	2	55780000000	57000000000	9
104	BANDA (55.78-57 GHz) BANDA 7                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	4	55780000000	57000000000	18
105	BANDA (55.78-57 GHz) BANDA 8                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	55780000000	57000000000	36
106	BANDA (55.78-57 GHz) BANDA 9                                                                                                    	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	10	55780000000	57000000000	72
107	BANDA (55.78-57 GHz) BANDA 10                                                                                                   	8	Para los sistemas del servicio fijo que utilizan TDD                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	15	55780000000	57000000000	144
108	BANDA (57-59 GHz)                                                                                                               	8	RECOMENDACIÓN UIT-R F. 1497-1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   	2	57000000000	59000000000	20
\.


--
-- Data for Name: operators; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY operators ("ID_operators", operators_name) FROM stdin;
1	Emcali                                                                                                                          
2	Une                                                                                                                             
3	Tigo                                                                                                                            
4	Olimpica Stereo                                                                                                                 
5	Radio FM                                                                                                                        
6	Radio amor                                                                                                                      
7	Radio Luna                                                                                                                      
8	Radio cometa                                                                                                                    
9	Comcel                                                                                                                          
10	Movistar                                                                                                                        
11	Telmex                                                                                                                          
12	Telefonica                                                                                                                      
13	Ejercito Nacional                                                                                                               
14	Marina nacional                                                                                                                 
15	Policia Nacional                                                                                                                
16	Ministerio de minas                                                                                                             
17	Ministerio de transporte                                                                                                        
18	Radioaficionados                                                                                                                
19	Radioastronomia                                                                                                                 
20	Amor Sterio                                                                                                                     
21	Canal Caracol                                                                                                                   
22	Canal Telepacifico                                                                                                              
23	Canal Tele antioquia                                                                                                            
24	Canal Tele caribe                                                                                                               
25	Canal Cali                                                                                                                      
26	Canal Universitario UV                                                                                                          
27	Canal Universitario Javeriana                                                                                                   
28	Radio Reggue                                                                                                                    
29	Radio Clasica                                                                                                                   
30	Radio El sol                                                                                                                    
31	Radio Tropicana                                                                                                                 
32	Agencia de vigilancia Titan                                                                                                     
33	Agencia de vigilancia Lost                                                                                                      
34	Agencia de vigilancia Los carcinos                                                                                              
35	Municipio de Cali                                                                                                               
36	Municipio de Cartagena                                                                                                          
37	Bogota Alcaldia Mayor                                                                                                           
38	Radioperadores el Carton                                                                                                        
39	EpCol S.A                                                                                                                       
40	Propel S.A                                                                                                                      
41	Torqueto S.A                                                                                                                    
42	Canal Irravisión                                                                                                                
43	Ministerio de hacienda                                                                                                          
44	Cruz Roja                                                                                                                       
45	Cruz Azul                                                                                                                       
46	EPS el Muerto                                                                                                                   
47	EPS Colmenares                                                                                                                  
48	EPS Colsanitas                                                                                                                  
49	EPU Costraints                                                                                                                  
50	El progreso S.A                                                                                                                 
51	Ranitas S.A                                                                                                                     
52	Sapitos S.A                                                                                                                     
53	Cain Ltda                                                                                                                       
54	Rockefeller org                                                                                                                 
55	Sabor Stereo                                                                                                                    
56	Soda Stereo                                                                                                                     
57	La mir Stereo                                                                                                                   
58	Rosa Stero                                                                                                                      
59	Palmira Stereo                                                                                                                  
60	Cartagena Stereo                                                                                                                
61	Radio Unica Nacional                                                                                                            
62	Radio Difusa Nacional                                                                                                           
63	Radio Clasica Cartagena                                                                                                         
64	Radio Clasica Bogota                                                                                                            
65	Radio Clasica el Perol                                                                                                          
66	Radio comunitaria emberá                                                                                                        
67	Radio comunitaria Chibcha                                                                                                       
68	Radio comunitaria del Cauca                                                                                                     
69	Radio comunitaria Nariño                                                                                                        
70	Radio Cucuta                                                                                                                    
71	Radio Bucaramanga                                                                                                               
72	Radio Popayan                                                                                                                   
73	Radio Mocoa                                                                                                                     
74	Radio Amazonas                                                                                                                  
75	Radio Llanos                                                                                                                    
76	Radio Pacifico                                                                                                                  
\.


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY services ("ID_service", services_name, services_description) FROM stdin;
1	Servicio de radiocomunicación                                                                                                   	Servicio definido en esta sección que implica la transmisión, la emisión o la recepción de ondas radioeléctricas para fines específicos de telecomunicación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
2	Servicio Fijo                                                                                                                   	Servicio de radiocomunicación entre puntos fijosdeterminados.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
3	Servicio Fijo por satélite                                                                                                      	Servicio de radiocomunicación entre estaciones terrenas situadas en emplazamientos dados cuando se utilizan uno o más satélites; el emplazamiento dado puede ser un punto fijo determinado o cualquier punto fijo situado en una zona determinada; en algunos casos, este Servicio incluye enlaces entre satélites que pueden realizarse también dentro del  Servicio entre satélites; el Servicio Fijo por satélite puede también incluir  enlaces de conexión para otros servicios de radiocomunicación espacial.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
4	Servicio entre satélites                                                                                                        	Servicio de radiocomunicación que establece enlaces entre satélites artificiales.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
5	Servicio de operaciones espaciales                                                                                              	Servicio de radiocomunicación que concierne exclusivamente al funcionamiento de los vehículos espaciales, en particular el seguimiento espacial, la telemedida espacial y el telemando espacial.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
6	Servicio Móvil                                                                                                                  	Servicio de radiocomunicación entre estaciones móviles y estaciones terrestres o entre estaciones móviles (CV).                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
7	Servicio Móvil por satélite                                                                                                     	Servicio de radiocomunicación:\n– entre estaciones terrenas móviles y una o varias estaciones espaciales o entre estaciones espaciales utilizadas por este Servicio; o\n– entre estaciones terrenas móviles por intermedio de una o varias  estaciones espaciales.\nTambién pueden considerarse incluidos en este Servicio los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
8	Servicio Móvil terrestre                                                                                                        	Servicio Móvil entre estaciones de base y estaciones móviles terrestres o entre estaciones móviles terrestres.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
9	Servicio Móvil terrestre por satélite                                                                                           	Servicio Móvil por satélite en el que  las estaciones terrenas móviles están situadas en tierra.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
10	Servicio Móvil Marítimo                                                                                                         	Servicio Móvil entre estaciones costeras y estaciones de barco, entre estaciones de barco, o entre estaciones de comunicaciones a bordo asociadas; también pueden considerarse incluidas en este Servicio las estaciones de embarcación o dispositivo de salvamento y las estaciones de radiobaliza de localización de siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
11	Servicio Móvil Marítimo por satélite                                                                                            	Servicio Móvil por satélite en el que  las estaciones terrenas móviles están situadas a bordo de barcos; también pueden considerarse incluidas en este Servicio las estaciones de embarcación o  dispositivo de salvamento y las estaciones de radiobaliza de localización de  siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
12	Servicio de operaciones portuarias                                                                                              	Servicio Móvil Marítimo en un  puerto o en sus cercanías, entre estaciones costeras y estaciones de barco, o  entre estaciones de barco, cuyos mensajes se refieren únicamente a las  operaciones, movimiento y seguridad de los barcos y, en caso de urgencia, a la salvaguardia de las personas.Quedan excluidos de este Servicio los mensajes con carácter de correspondencia pública.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
13	Servicio de movimiento de barcos                                                                                                	Servicio de seguridad, dentro del Servicio Móvil Marítimo, distinto del Servicio de operaciones portuarias, entre estaciones costeras y estaciones de barco, o entre estaciones de barco, cuyos\nmensajes se refieren únicamente a los movimientos de los barcos. Quedan excluidos de este Servicio los mensajes con carácter de correspondencia pública.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
14	Servicio Móvil aeronáutico                                                                                                      	Servicio Móvil entre estaciones aeronáuticas y estaciones de aeronave, o entre estaciones de aeronave, en el que también pueden participar las estaciones de embarcación o dispositivo de salvamento; también pueden considerarse incluidas en este Servicio las estaciones de radiobaliza de localización de siniestros que operen en las frecuencias de socorro y de urgencia designadas.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
15	Servicio Móvil aeronáutico en rutas (R)                                                                                         	Servicio Móvil aeronáutico reservado a  las comunicaciones aeronáuticas relativas a la seguridad y regularidad de los  vuelos, principalmente en las rutas nacionales o internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
16	Servicio Móvil aeronáutico fuera de rutas (OR)                                                                                  	Servicio Móvil aeronáutico destinado  a asegurar las comunicaciones, incluyendo las relativas a la coordinación de los  vuelos, principalmente fuera de las rutas nacionales e internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
17	Servicio Móvil aeronáutico por satélite                                                                                         	Servicio Móvil por satélite en el  que las estaciones terrenas móviles están situadas a bordo de aeronaves;  también pueden considerarse incluidas en este Servicio las estaciones de  embarcación o dispositivo de salvamento y las estaciones de radiobaliza de   localización de siniestros.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
18	Servicio Móvil aeronáutico en rutas (R) por satélite                                                                            	Servicio Móvil aeronáutico por  satélite reservado a las comunicaciones relativas a la seguridad y regularidad de  los vuelos, principalmente en las rutas nacionales o internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
19	Servicio Móvil aeronáutico fuera de rutas (OR) por satélite                                                                     	Servicio Móvil aeronáutico por  satélite destinado a asegurar las comunicaciones, incluyendo las relativas a la  coordinación de los vuelos, principalmente fuera de las rutas nacionales e  internacionales de la aviación civil.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
20	Servicio de Radiodifusión                                                                                                       	Servicio de radiocomunicación cuyas emisiones se destinan a ser recibidas directamente por el público en general. Dicho Servicio abarca emisiones sonoras, de televisión o de otro género (CS).                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
21	Servicio de Radiodifusión por satélite                                                                                          	Servicio de radiocomunicación en el cual las señales emitidas o retransmitidas por estaciones espaciales están  destinadas a la recepción directa por el público en general.  En el Servicio de Radiodifusión por satélite la expresión «recepción directa» abarca tanto la recepción individual como la recepción comunal.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
22	Servicio de radiodeterminación                                                                                                  	Servicio de radiocomunicación para fines de radiodeterminación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
23	Servicio de radiodeterminación por satélite                                                                                     	Servicio de radiocomunicación para fines de radiodeterminación, y que implica la  utilización de una o más estaciones espaciales. Este Servicio puede incluir también los enlaces de conexión necesarios para su funcionamiento.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
24	Servicio de radionavegación                                                                                                     	Servicio de radiodeterminación para fines de radionavegación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
25	Servicio de radionavegación por satélite                                                                                        	Servicio de radiodeterminación por satélite para fines de radionavegación. También pueden considerarse incluidos en este Servicio los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
26	Servicio de radionavegación marítima                                                                                            	Servicio de radionavegación destinado a los barcos y a su explotación en condiciones de seguridad.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
27	Servicio de radionavegación marítima por satélite                                                                               	Servicio de radionavegación por satélite en el que las estaciones terrenas están situadas a  bordo de barcos.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
28	Servicio de radionavegación aeronáutica                                                                                         	Servicio de radionavegación destinado a las aeronaves y a su explotación en condiciones de seguridad.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
29	Servicio de radionavegación aeronáutica por satélite                                                                            	 Servicio deradionavegación por satélite en el que las estaciones terrenas están situadas a bordo de aeronaves.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
30	Servicio de radiolocalización                                                                                                   	Servicio de radiodeterminación para fines de radiolocalización.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
31	Servicio de radiolocalización por satélite                                                                                      	Servicio radiodeterminación por satélite utilizado para la radiolocalización. De Este Servicio puede incluir asimismo los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
32	Servicio de ayudas a la meteorología                                                                                            	Servicio de radiocomunicación destinado a las observaciones y sondeos utilizados en meteorología, con inclusión de la hidrología.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
33	Servicio de exploración de la Tierra por satélite                                                                               	Servicio de radiocomunicación entre estaciones terrenas y una o varias estaciones espaciales que puede incluir enlaces entre estaciones espaciales y en el que:\n – se obtiene información sobre las características de la Tierra y sus  fenómenos naturales, incluidos datos relativos al estado del medio ambiente, por medio de sensores activos o de sensores pasivos a bordo de satélites de la Tierra;\n– se reúne información análoga por medio de plataformas situadas en el aire o sobre la superficie de la Tierra;\n– dichas informaciones pueden ser distribuidas a estaciones terrenas dentro de un mismo sistema;\n– puede incluirse asimismo la interrogación a las plataformas.Este Servicio puede incluir también los enlaces de conexión necesarios\npara su explotación.                                                                                                                                                                                                                                                                          
34	Servicio de meteorología por satélite                                                                                           	Servicio de exploración de la Tierra por satélite con fines meteorológicos.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
35	Servicio de frecuencias patrón y de señales horarias                                                                            	 Servicio de radiocomunicación para la transmisión de frecuencias especificadas, de señales horarias, o de ambas, de reconocida y elevada precisión, para fines científicos, técnicos y de otras clases, destinadas a la recepción general.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
36	Servicio de frecuencias patrón y de señales horarias por satélite                                                               	Servicio de radiocomunicación que utiliza estaciones espaciales situadas en satélites de la Tierra para los mismos fines que el Servicio de frecuencias patrón y de  señales horarias. Este Servicio puede incluir también los enlaces de conexión necesarios para su explotación.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
37	Servicio de investigación espacial                                                                                              	Servicio de radiocomunicación que utiliza vehículos espaciales u otros objetos espaciales para fines de investigación científica o tecnológica.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
38	Servicio de aficionados                                                                                                         	Servicio de radiocomunicación que tiene por objeto la instrucción individual, la intercomunicación y los estudios técnicos, efectuado por aficionados, esto es, por personas debidamente autorizadas que se  interesan en la radiotecnia con carácter exclusivamente personal y sin fines de lucro.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
39	Servicio de aficionados por satélite                                                                                            	Servicio de radiocomunicación que utiliza estaciones espaciales situadas en satélites de la Tierra para los mismos fines que el Servicio de aficionados.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
40	Servicio de radioastronomía                                                                                                     	Servicio que entraña el empleo de la radioastronomía.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
41	Servicio de seguridad                                                                                                           	Todo Servicio radioeléctrico que se explote de manera permanente o temporal para garantizar la seguridad de la vida humana y la salvaguardia de los bienes.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
42	Servicio especial                                                                                                               	ervicio de radiocomunicación no definido en otro lugar de la presente sección, destinado exclusivamente a satisfacer necesidades determinadas de interés general y no abierto a la correspondencia                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
\.


--
-- Data for Name: services_by_channel_assignation; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY services_by_channel_assignation ("ID_Services_by_channel_assignation", "ID_Channels_assignations", "ID_Services") FROM stdin;
\.


--
-- Data for Name: services_by_frequency_ranks; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY services_by_frequency_ranks ("ID_Service_by_Frequency_Rank", "ID_Service", "ID_frequency_ranks") FROM stdin;
1107	2	1
1108	3	1
1109	10	1
1110	11	1
1111	12	1
1112	13	1
1113	2	2
1114	3	2
1115	6	2
1116	7	2
1117	8	2
1118	9	2
1119	10	2
1120	11	2
1121	12	2
1122	13	2
1123	14	2
1124	16	2
1125	17	2
1126	18	2
1127	19	2
1128	15	3
1129	2	4
1130	3	4
1131	10	4
1132	11	4
1133	12	4
1134	13	4
1135	10	5
1136	11	5
1137	12	5
1138	13	5
1139	10	6
1140	11	6
1141	12	6
1142	13	6
1143	10	7
1144	11	7
1145	12	7
1146	13	7
1147	10	8
1148	11	8
1149	12	8
1150	13	8
1151	10	9
1152	11	9
1153	12	9
1154	13	9
1155	2	10
1156	3	10
1157	1	10
1158	40	10
1159	20	10
1160	21	10
1161	10	10
1162	11	10
1163	12	10
1164	13	10
1165	14	10
1166	16	10
1167	17	10
1168	18	10
1169	19	10
1170	1	11
1171	2	11
1172	3	11
1173	6	11
1174	7	11
1175	8	11
1176	9	11
1177	10	11
1178	11	11
1179	12	11
1180	13	11
1181	20	12
1182	21	12
1183	10	13
1184	11	13
1185	6	14
1186	7	14
1187	8	14
1188	9	14
1189	10	14
1190	11	14
1191	12	14
1192	13	14
1193	14	14
1194	15	14
1195	16	14
1196	17	14
1197	18	14
1198	19	14
1199	2	15
1200	3	15
1201	7	15
1202	8	15
1203	9	15
1204	10	15
1205	11	15
1206	12	15
1207	13	15
1208	14	15
1209	15	15
1210	16	15
1211	17	15
1212	18	15
1213	19	15
1214	1	16
1215	2	16
1216	40	16
1217	2	17
1218	3	17
1219	7	17
1220	8	17
1221	9	17
1222	10	17
1223	11	17
1224	12	17
1225	13	17
1226	14	17
1227	15	17
1228	16	17
1229	17	17
1230	18	17
1231	19	17
1232	30	17
1233	31	17
1234	40	17
1235	2	18
1236	3	18
1237	7	18
1238	8	18
1239	9	18
1240	10	18
1241	11	18
1242	12	18
1243	13	18
1244	14	18
1245	15	18
1246	16	18
1247	17	18
1248	18	18
1249	19	18
1250	30	18
1251	31	18
1252	40	18
1253	2	19
1254	3	19
1255	7	19
1256	8	19
1257	9	19
1258	10	19
1259	11	19
1260	12	19
1261	13	19
1262	14	19
1263	15	19
1264	16	19
1265	17	19
1266	18	19
1267	19	19
1268	30	19
1269	31	19
1270	40	19
1271	2	20
1272	3	20
1273	7	20
1274	8	20
1275	9	20
1276	10	20
1277	11	20
1278	12	20
1279	13	20
1280	14	20
1281	15	20
1282	16	20
1283	17	20
1284	18	20
1285	19	20
1286	30	20
1287	31	20
1288	40	20
1289	2	21
1290	3	21
1291	7	21
1292	8	21
1293	9	21
1294	10	21
1295	11	21
1296	12	21
1297	13	21
1298	14	21
1299	15	21
1300	16	21
1301	17	21
1302	18	21
1303	19	21
1304	30	21
1305	31	21
1306	40	21
1307	2	22
1308	3	22
1309	7	22
1310	8	22
1311	9	22
1312	10	22
1313	11	22
1314	12	22
1315	13	22
1316	14	22
1317	15	22
1318	16	22
1319	17	22
1320	18	22
1321	19	22
1322	30	22
1323	31	22
1324	40	22
1325	2	23
1326	3	23
1327	7	23
1328	8	23
1329	9	23
1330	10	23
1331	11	23
1332	12	23
1333	13	23
1334	14	23
1335	15	23
1336	16	23
1337	17	23
1338	18	23
1339	19	23
1340	30	23
1341	31	23
1342	40	23
1343	2	24
1344	3	24
1345	7	24
1346	8	24
1347	9	24
1348	10	24
1349	11	24
1350	12	24
1351	13	24
1352	14	24
1353	15	24
1354	16	24
1355	17	24
1356	18	24
1357	19	24
1358	30	24
1359	31	24
1360	40	24
1361	2	25
1362	3	25
1363	7	25
1364	8	25
1365	9	25
1366	10	25
1367	11	25
1368	12	25
1369	13	25
1370	14	25
1371	15	25
1372	16	25
1373	17	25
1374	18	25
1375	19	25
1376	30	25
1377	31	25
1378	40	25
1379	2	26
1380	3	26
1381	7	26
1382	8	26
1383	9	26
1384	10	26
1385	11	26
1386	12	26
1387	13	26
1388	14	26
1389	15	26
1390	16	26
1391	17	26
1392	18	26
1393	19	26
1394	30	26
1395	31	26
1396	40	26
1397	2	27
1398	3	27
1399	7	27
1400	8	27
1401	9	27
1402	10	27
1403	11	27
1404	12	27
1405	13	27
1406	14	27
1407	15	27
1408	16	27
1409	17	27
1410	18	27
1411	19	27
1412	30	27
1413	31	27
1414	40	27
1415	2	28
1416	3	28
1417	7	28
1418	8	28
1419	9	28
1420	10	28
1421	11	28
1422	12	28
1423	13	28
1424	14	28
1425	15	28
1426	16	28
1427	17	28
1428	18	28
1429	19	28
1430	30	28
1431	31	28
1432	40	28
1433	2	29
1434	3	29
1435	7	29
1436	8	29
1437	9	29
1438	10	29
1439	11	29
1440	12	29
1441	13	29
1442	14	29
1443	15	29
1444	16	29
1445	17	29
1446	18	29
1447	19	29
1448	30	29
1449	31	29
1450	40	29
1451	2	30
1452	3	30
1453	7	30
1454	8	30
1455	9	30
1456	10	30
1457	11	30
1458	12	30
1459	13	30
1460	14	30
1461	15	30
1462	16	30
1463	17	30
1464	18	30
1465	19	30
1466	30	30
1467	31	30
1468	40	30
1469	2	31
1470	3	31
1471	7	31
1472	8	31
1473	9	31
1474	10	31
1475	11	31
1476	12	31
1477	13	31
1478	14	31
1479	15	31
1480	16	31
1481	17	31
1482	18	31
1483	19	31
1484	30	31
1485	31	31
1486	40	31
1487	2	32
1488	3	32
1489	7	32
1490	8	32
1491	9	32
1492	10	32
1493	11	32
1494	12	32
1495	13	32
1496	14	32
1497	15	32
1498	16	32
1499	17	32
1500	18	32
1501	19	32
1502	30	32
1503	31	32
1504	40	32
1505	6	33
1506	7	33
1507	8	33
1508	9	33
1509	6	34
1510	7	34
1511	8	34
1512	9	34
1513	6	35
1514	7	35
1515	8	35
1516	9	35
1517	6	36
1518	7	36
1519	8	36
1520	9	36
1521	2	37
1522	3	37
1523	6	37
1524	7	37
1525	8	37
1526	9	37
1527	2	38
1528	3	38
1529	6	38
1530	7	38
1531	8	38
1532	9	38
1533	2	39
1534	3	39
1535	6	39
1536	7	39
1537	8	39
1538	9	39
1539	2	40
1540	3	40
1541	6	40
1542	7	40
1543	8	40
1544	9	40
1545	2	41
1546	3	41
1547	32	41
1548	6	41
1549	7	41
1550	8	41
1551	9	41
1552	10	41
1553	11	41
1554	12	41
1555	13	41
1556	32	42
1557	2	42
1558	3	42
1559	4	42
1560	5	42
1561	6	42
1562	7	42
1563	8	42
1564	9	42
1565	2	43
1566	3	43
1567	4	43
1568	5	43
1569	6	43
1570	7	43
1571	8	43
1572	9	43
1573	20	44
1574	21	44
1575	22	44
1576	23	44
1577	2	44
1578	3	44
1579	6	44
1580	7	44
1581	8	44
1582	9	44
1583	2	45
1584	3	45
1585	6	45
1586	7	45
1587	8	45
1588	9	45
1589	2	46
1590	3	46
1591	6	46
1592	7	46
1593	8	46
1594	9	46
1595	2	47
1596	3	47
1597	6	47
1598	7	47
1599	8	47
1600	9	47
1601	2	48
1602	3	48
1603	6	48
1604	7	48
1605	8	48
1606	9	48
1607	2	49
1608	3	49
1609	6	49
1610	7	49
1611	8	49
1612	9	49
1613	2	50
1614	3	50
1615	6	50
1616	7	50
1617	8	50
1618	9	50
1619	2	51
1620	3	51
1621	6	51
1622	7	51
1623	8	51
1624	9	51
1625	2	52
1626	3	52
1627	24	53
1628	25	53
1629	26	53
1630	27	53
1631	28	53
1632	29	53
1633	2	53
1634	3	53
1635	5	53
1636	40	53
1637	38	53
1638	39	53
1639	33	53
1640	34	53
1641	35	53
1642	36	53
1643	37	53
1644	6	53
1645	7	53
1646	8	53
1647	9	53
1648	24	54
1649	25	54
1650	26	54
1651	27	54
1652	28	54
1653	29	54
1654	2	54
1655	3	54
1656	5	54
1657	40	54
1658	38	54
1659	39	54
1660	33	54
1661	34	54
1662	35	54
1663	36	54
1664	37	54
1665	6	54
1666	7	54
1667	8	54
1668	9	54
1669	24	55
1670	25	55
1671	26	55
1672	27	55
1673	28	55
1674	29	55
1675	14	55
1676	15	55
1677	16	55
1678	17	55
1679	18	55
1680	19	55
1681	33	55
1682	37	55
1683	30	55
1684	31	55
1685	26	55
1686	27	55
1687	24	56
1688	25	56
1689	26	56
1690	27	56
1691	28	56
1692	29	56
1693	14	56
1694	15	56
1695	16	56
1696	17	56
1697	18	56
1698	19	56
1699	33	56
1700	37	56
1701	30	56
1702	31	56
1703	26	56
1704	27	56
1705	24	57
1706	25	57
1707	26	57
1708	27	57
1709	28	57
1710	29	57
1711	14	57
1712	15	57
1713	16	57
1714	17	57
1715	18	57
1716	19	57
1717	33	57
1718	37	57
1719	30	57
1720	31	57
1721	26	57
1722	27	57
1723	24	58
1724	25	58
1725	26	58
1726	27	58
1727	28	58
1728	29	58
1729	14	58
1730	15	58
1731	16	58
1732	17	58
1733	18	58
1734	19	58
1735	33	58
1736	37	58
1737	30	58
1738	31	58
1739	26	58
1740	27	58
1741	24	59
1742	25	59
1743	26	59
1744	27	59
1745	28	59
1746	29	59
1747	14	59
1748	15	59
1749	16	59
1750	17	59
1751	18	59
1752	19	59
1753	33	59
1754	37	59
1755	30	59
1756	31	59
1757	26	59
1758	27	59
1759	2	60
1760	3	60
1761	6	60
1762	7	60
1763	8	60
1764	9	60
1765	37	60
1766	2	61
1767	3	61
1768	6	61
1769	7	61
1770	8	61
1771	9	61
1772	37	61
1773	2	62
1774	3	62
1775	6	62
1776	7	62
1777	8	62
1778	9	62
1779	37	62
1780	2	63
1781	3	63
1782	6	63
1783	7	63
1784	8	63
1785	9	63
1786	37	63
1787	2	64
1788	3	64
1789	6	64
1790	7	64
1791	8	64
1792	9	64
1793	37	64
1794	2	65
1795	3	65
1796	32	65
1797	6	65
1798	7	65
1799	8	65
1800	9	65
1801	22	65
1802	23	65
1803	24	65
1804	25	65
1805	26	65
1806	27	65
1807	28	65
1808	29	65
1809	30	65
1810	31	65
1811	2	66
1812	3	66
1813	32	66
1814	6	66
1815	7	66
1816	8	66
1817	9	66
1818	22	66
1819	23	66
1820	24	66
1821	25	66
1822	26	66
1823	27	66
1824	28	66
1825	29	66
1826	30	66
1827	31	66
1828	2	67
1829	3	67
1830	32	67
1831	6	67
1832	7	67
1833	8	67
1834	9	67
1835	22	67
1836	23	67
1837	24	67
1838	25	67
1839	26	67
1840	27	67
1841	28	67
1842	29	67
1843	30	67
1844	31	67
1845	2	68
1846	3	68
1847	32	68
1848	6	68
1849	7	68
1850	8	68
1851	9	68
1852	22	68
1853	23	68
1854	24	68
1855	25	68
1856	26	68
1857	27	68
1858	28	68
1859	29	68
1860	30	68
1861	31	68
1862	38	69
1863	39	69
1864	30	69
1865	31	69
1866	2	69
1867	3	69
1868	40	69
1869	41	69
1870	42	69
1871	6	69
1872	7	69
1873	8	69
1874	9	69
1875	38	70
1876	39	70
1877	30	70
1878	31	70
1879	2	70
1880	3	70
1881	40	70
1882	41	70
1883	42	70
1884	6	70
1885	7	70
1886	8	70
1887	9	70
1888	38	71
1889	39	71
1890	30	71
1891	31	71
1892	2	71
1893	3	71
1894	40	71
1895	41	71
1896	42	71
1897	6	71
1898	7	71
1899	8	71
1900	9	71
1901	38	72
1902	39	72
1903	30	72
1904	31	72
1905	2	72
1906	3	72
1907	40	72
1908	41	72
1909	42	72
1910	6	72
1911	7	72
1912	8	72
1913	9	72
1914	38	73
1915	39	73
1916	30	73
1917	31	73
1918	2	73
1919	3	73
1920	40	73
1921	41	73
1922	42	73
1923	6	73
1924	7	73
1925	8	73
1926	9	73
1927	28	74
1928	29	74
1929	37	74
1930	3	74
1931	24	74
1932	25	74
1933	26	74
1934	27	74
1935	28	74
1936	29	74
1937	28	75
1938	29	75
1939	37	75
1940	3	75
1941	24	75
1942	25	75
1943	26	75
1944	27	75
1945	28	75
1946	29	75
1947	33	76
1948	40	76
1949	37	76
1950	28	76
1951	29	76
1952	30	76
1953	31	76
1954	37	77
1955	2	77
1956	3	77
1957	6	77
1958	7	77
1959	8	77
1960	9	77
1961	37	78
1962	2	78
1963	3	78
1964	6	78
1965	7	78
1966	8	78
1967	9	78
1968	37	79
1969	2	79
1970	3	79
1971	6	79
1972	7	79
1973	8	79
1974	9	79
1975	37	80
1976	2	80
1977	3	80
1978	6	80
1979	7	80
1980	8	80
1981	9	80
1982	2	81
1983	3	81
1984	6	81
1985	7	81
1986	8	81
1987	9	81
1988	40	81
1989	37	81
1990	2	82
1991	3	82
1992	6	82
1993	7	82
1994	8	82
1995	9	82
1996	40	82
1997	37	82
1998	33	83
1999	3	83
2000	6	83
2001	7	83
2002	8	83
2003	9	83
2004	35	83
2005	36	83
2006	33	84
2007	3	84
2008	6	84
2009	7	84
2010	8	84
2011	9	84
2012	35	84
2013	36	84
2014	33	85
2015	3	85
2016	6	85
2017	7	85
2018	8	85
2019	9	85
2020	35	85
2021	36	85
2022	33	86
2023	3	86
2024	6	86
2025	7	86
2026	8	86
2027	9	86
2028	35	86
2029	36	86
2030	33	87
2031	3	87
2032	6	87
2033	7	87
2034	8	87
2035	9	87
2036	35	87
2037	36	87
2038	33	88
2039	3	88
2040	6	88
2041	7	88
2042	8	88
2043	9	88
2044	35	88
2045	36	88
2046	33	89
2047	3	89
2048	6	89
2049	7	89
2050	8	89
2051	9	89
2052	35	89
2053	36	89
2054	2	90
2055	3	90
2056	6	90
2057	7	90
2058	8	90
2059	9	90
2060	33	90
2061	2	91
2062	3	91
2063	33	91
2064	6	91
2065	7	91
2066	8	91
2067	9	91
2068	2	92
2069	3	92
2070	33	92
2071	6	92
2072	7	92
2073	8	92
2074	9	92
2075	2	93
2076	3	93
2077	6	93
2078	7	93
2079	8	93
2080	9	93
2081	2	94
2082	3	94
2083	6	94
2084	7	94
2085	8	94
2086	9	94
2087	2	95
2088	3	95
2089	6	95
2090	7	95
2091	8	95
2092	9	95
2093	2	96
2094	3	96
2095	6	96
2096	7	96
2097	8	96
2098	9	96
2099	2	97
2100	3	97
2101	6	97
2102	7	97
2103	8	97
2104	9	97
2105	33	98
2106	2	98
2107	3	98
2108	4	98
2109	33	98
2110	37	98
2111	6	98
2112	7	98
2113	8	98
2114	9	98
2115	33	99
2116	2	99
2117	3	99
2118	4	99
2119	33	99
2120	37	99
2121	6	99
2122	7	99
2123	8	99
2124	9	99
2125	33	100
2126	2	100
2127	3	100
2128	4	100
2129	33	100
2130	37	100
2131	6	100
2132	7	100
2133	8	100
2134	9	100
2135	33	101
2136	2	101
2137	3	101
2138	4	101
2139	33	101
2140	37	101
2141	6	101
2142	7	101
2143	8	101
2144	9	101
2145	33	102
2146	2	102
2147	3	102
2148	4	102
2149	33	102
2150	37	102
2151	6	102
2152	7	102
2153	8	102
2154	9	102
2155	33	103
2156	2	103
2157	3	103
2158	4	103
2159	33	103
2160	37	103
2161	6	103
2162	7	103
2163	8	103
2164	9	103
2165	33	104
2166	2	104
2167	3	104
2168	4	104
2169	33	104
2170	37	104
2171	6	104
2172	7	104
2173	8	104
2174	9	104
2175	33	105
2176	2	105
2177	3	105
2178	4	105
2179	33	105
2180	37	105
2181	6	105
2182	7	105
2183	8	105
2184	9	105
2185	33	106
2186	2	106
2187	3	106
2188	4	106
2189	33	106
2190	37	106
2191	6	106
2192	7	106
2193	8	106
2194	9	106
2195	33	107
2196	2	107
2197	3	107
2198	4	107
2199	33	107
2200	37	107
2201	6	107
2202	7	107
2203	8	107
2204	9	107
2205	2	108
2206	3	108
2207	6	108
2208	7	108
2209	8	108
2210	9	108
2211	4	108
2212	37	108
\.


--
-- Data for Name: services_by_operator; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY services_by_operator ("ID_Services_by_Operator", "ID_Operator", "ID_Service") FROM stdin;
1	1	1
2	1	2
3	1	3
4	1	4
5	1	5
6	1	6
7	2	1
8	2	2
9	2	3
10	2	4
11	2	5
12	2	6
13	3	1
14	3	2
15	3	3
16	3	4
17	3	5
18	3	6
19	4	20
20	5	20
21	6	20
22	7	20
23	8	20
24	9	1
25	9	2
26	9	3
27	9	4
28	9	6
29	10	1
30	10	2
31	10	3
32	10	4
33	10	6
34	11	1
35	11	2
36	11	3
37	11	4
38	11	6
39	12	1
40	12	2
41	12	3
42	12	4
43	12	6
44	13	14
45	13	15
46	13	16
47	13	17
48	13	18
49	13	19
50	13	20
51	13	21
52	13	22
53	13	23
54	13	24
55	13	25
56	14	1
57	14	2
58	14	3
59	14	4
60	14	5
61	14	6
62	14	7
63	14	8
64	14	9
65	14	10
66	14	11
67	14	12
68	14	13
69	14	14
70	14	15
71	14	16
72	14	17
73	14	18
74	14	19
75	14	20
76	14	21
77	14	22
78	14	23
79	14	24
80	14	25
81	14	26
82	14	27
83	14	28
84	14	29
85	14	30
86	14	31
87	14	32
88	15	20
89	15	21
90	15	30
91	15	31
92	16	14
93	16	20
94	16	22
95	17	6
96	17	20
97	18	6
98	18	10
99	18	20
100	18	24
101	19	4
102	19	7
103	19	9
104	19	17
105	19	21
106	19	23
107	19	25
108	19	27
109	19	29
110	19	31
111	20	20
112	21	20
113	21	21
114	22	20
115	22	21
116	23	20
117	23	21
118	24	20
119	24	21
120	25	20
121	25	21
122	26	20
123	26	21
124	27	20
125	27	21
126	28	20
127	29	20
128	30	20
129	31	20
130	32	6
131	33	6
132	34	6
133	35	2
134	35	6
135	35	20
136	36	2
137	36	6
138	36	20
139	37	2
140	37	6
141	37	20
142	38	6
143	39	6
144	40	6
145	41	6
146	42	2
147	42	6
148	42	20
149	43	2
150	44	2
151	44	20
152	45	2
153	45	20
154	46	1
155	47	1
156	48	1
157	49	1
158	50	1
159	51	1
160	52	1
161	53	1
162	54	1
163	55	20
164	56	20
165	57	20
166	58	20
167	59	20
168	60	20
169	61	20
170	62	20
171	63	20
172	64	20
173	65	20
174	66	20
175	67	20
176	68	20
177	69	20
178	70	20
179	71	20
180	72	20
181	73	20
182	74	20
183	75	20
184	76	20
\.


--
-- Data for Name: territorial_divisions; Type: TABLE DATA; Schema: public; Owner: drupal
--

COPY territorial_divisions ("ID_Territorial_Division", "Territorial_Division_Name") FROM stdin;
1	DIRECCION TERRITORIAL BARRANQUILLA                                                                                              
2	DIRECCIÓN TERRITORIAL MEDELLÍN                                                                                                  
3	DIRECCIÓN TERRITORIAL CÚCUTA                                                                                                    
4	DIRECCIÓN TERRITORIAL BUCARAMANGA                                                                                               
5	DIRECCIÓN TERRITORIAL CALI                                                                                                      
6	DIRECCION GENERAL DE CONTROL Y VIGILANCIA MONITORA EL CERRITO                                                                   
7	NACIONAL                                                                                                                        
\.


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
-- Name: Primary_Key_assignations_channels; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
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
-- Name: channels_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY channels
    ADD CONSTRAINT channels_pkey PRIMARY KEY ("ID_channels");


--
-- Name: cities_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY ("ID_cities");


--
-- Name: frequency_ranks_pkey; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY frequency_ranks
    ADD CONSTRAINT frequency_ranks_pkey PRIMARY KEY ("ID_frequency_ranks");


--
-- Name: primary_ket_operators; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY operators
    ADD CONSTRAINT primary_ket_operators PRIMARY KEY ("ID_operators");


--
-- Name: primary_key_frequency_bands; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY frequency_bands
    ADD CONSTRAINT primary_key_frequency_bands PRIMARY KEY ("ID_frequency_bands");


--
-- Name: primery_key_departaments; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
--

ALTER TABLE ONLY departaments
    ADD CONSTRAINT primery_key_departaments PRIMARY KEY ("ID_departament");


--
-- Name: primery_key_services; Type: CONSTRAINT; Schema: public; Owner: drupal; Tablespace: 
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
-- Name: channel_assignations_id_channels_assignations_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX channel_assignations_id_channels_assignations_index ON "channel_Assignations" USING btree (id_channels_assignations);


--
-- Name: cities_id_cities_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX cities_id_cities_index ON cities USING btree ("ID_cities");


--
-- Name: departaments_id_departaments_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX departaments_id_departaments_index ON departaments USING btree ("ID_departament");


--
-- Name: frequency_bands_id_frequency_bands_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX frequency_bands_id_frequency_bands_index ON frequency_bands USING btree ("ID_frequency_bands");


--
-- Name: frequency_ranks_id_frequency_ranks_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX frequency_ranks_id_frequency_ranks_index ON frequency_ranks USING btree ("ID_frequency_ranks");


--
-- Name: operators_id_operators_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
--

CREATE INDEX operators_id_operators_index ON operators USING btree ("ID_operators");


--
-- Name: services_id_service_index; Type: INDEX; Schema: public; Owner: drupal; Tablespace: 
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
-- Name: channel_assignations_id_channels_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channel_assignations_id_channels_fkey FOREIGN KEY (id_channels) REFERENCES channels("ID_channels");


--
-- Name: channel_assignations_id_city_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channel_assignations_id_city_fkey FOREIGN KEY (id_city) REFERENCES cities("ID_cities");


--
-- Name: channels_assigment_by_operator; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY "channel_Assignations"
    ADD CONSTRAINT channels_assigment_by_operator FOREIGN KEY (id_operators) REFERENCES operators("ID_operators");


--
-- Name: channels_id_frequency_ranks_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY channels
    ADD CONSTRAINT channels_id_frequency_ranks_fkey FOREIGN KEY ("ID_frequency_ranks") REFERENCES frequency_ranks("ID_frequency_ranks");


--
-- Name: cities_by_departament; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_by_departament FOREIGN KEY ("ID_departaments") REFERENCES departaments("ID_departament");


--
-- Name: departaments_ID_Territorial_Division_fkey; Type: FK CONSTRAINT; Schema: public; Owner: drupal
--

ALTER TABLE ONLY departaments
    ADD CONSTRAINT "departaments_ID_Territorial_Division_fkey" FOREIGN KEY ("ID_Territorial_Division") REFERENCES territorial_divisions("ID_Territorial_Division");


--
-- Name: frequency_bands_by_rank; Type: FK CONSTRAINT; Schema: public; Owner: drupal
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

